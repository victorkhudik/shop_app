<?php

namespace Modules\Sales\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Modules\Catalog\Models\Product;
use Modules\Sales\Http\Requests\CreateOrderRequest;
use Modules\Sales\Models\Order;
use Modules\Sales\Models\ProductKey;
use Modules\Catalog\Events\ProductUpdated;
use Modules\Sales\Events\OrderUpdated;

class OrderController extends Controller
{
    public function store(CreateOrderRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $product = Product::where('id', $request->product_id)
                ->where('is_active', true)
                ->lockForUpdate()
                ->firstOrFail();

            if ($product->quantity < 1) {
                return response()->json([
                    'code' => 'OUT_OF_STOCK',
                    'message' => 'Товар закончился или уже забронирован другом покупателем.'
                ], 422);
            }

            $product->decrement('quantity', 1);

            $reservationMinutes = config('sales.reservation_time', 5);
            $expiresAt = now()->addMinutes($reservationMinutes);

            $order = Order::create([
                'uuid' => (string)Str::uuid(),
                'product_id' => $product->id,
                'amount' => $product->special_price && $product->special_price < $product->price  ? $product->special_price: $product->price,
                'status' => Order::STATUS_PENDING,
                'expires_at' => $expiresAt,
            ]);

            event(new ProductUpdated($product->fresh()));

            return response()->json([
                'order_uuid' => $order->uuid,
                'status' => $order->status,
                'amount' => $order->amount,
            ], 201);

        });
    }

    public function show($uuid)
    {
        $order = Order::with('product') // Загружаем связанные данные товара из модели Catalog
        ->where('uuid', $uuid)
            ->firstOrFail();

        return response()->json([
            'uuid' => $order->uuid,
            'status' => $order->status,
            'amount' => $order->amount,
            'email' => $order->email,
            'created_at' => $order->created_at->format('Y-m-d H:i:s'),
            'expires_at' => Carbon::parse($order->expires_at)->toIso8601String(),
            'product' => [
                'id' => $order->product->id,
                'name' => $order->product->name
            ],
            'key' => $order->key ? $order->key->key_value : null,
        ]);
    }

    public function pay($uuid)
    {
        return DB::transaction(function () use ($uuid) {
            $order = Order::where('uuid', $uuid)->lockForUpdate()->firstOrFail();

            if ($order->status !== Order::STATUS_PENDING) {
                return response()->json(['message' => 'Заказ уже обработан']);
            }

            $product = Product::where('id', $order->product_id)
                ->where('is_active', true)
                ->lockForUpdate()
                ->firstOrFail();

            if ($product->quantity <= 0) {
                $order->update(['status' => Order::STATUS_FAILED]);
                event(new OrderUpdated($order->fresh()));

                return response()->json(['message' => 'Товар закончился'], 422);
            }

            $product->increment('sales', 1);
            event(new ProductUpdated($product->fresh()));

            $key = ProductKey::where('is_issued', false)
                ->lockForUpdate()
                ->first();

            if (!$key) {
                $order->update(['status' => Order::STATUS_FAILED]);
                event(new OrderUpdated($order->fresh()));

                return response()->json(['message' => 'Ключи закончились', 'status' => 'failed'], 422);
            }

            $key->update([
                'is_issued' => true,
                'order_id' => $order->id,
            ]);

            $order->update(['status' => Order::STATUS_COMPLETED]);
            event(new OrderUpdated($order->fresh()));

            return response()->json(['message' => 'Success', 'status' => 'paid', 'amount' => $order->amount, 'key_value' => $key->key_value], 200);
        });
    }

    public function cancel($uuid)
    {
        return DB::transaction(function () use ($uuid) {
            $order = Order::where('uuid', $uuid)->lockForUpdate()->firstOrFail();

            if ($order->status === Order::STATUS_PENDING) {
                $order->update(['status' => Order::STATUS_CANCELLED]);

                $product = Product::where('id', $order->product_id)->lockForUpdate()->first();
                if ($product) {
                    $product->increment('quantity', 1);
                    event(new ProductUpdated($product->fresh()));
                }

                event(new OrderUpdated($order->fresh()));
            }

            return response()->json(['message' => 'Бронь отменена']);
        });
    }
}
