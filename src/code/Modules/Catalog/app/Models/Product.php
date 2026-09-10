<?php

namespace Modules\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Sales\Models\Order;
use Modules\Sales\Events\OrderUpdated;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'sku',
        'name',
        'slug',
        'description',
        'price',
        'special_price',
        'image',
        'quantity',
        'type',
        'is_active',
        'attributes',
    ];

    protected $casts = [
        'price' => 'float',
        'special_price' => 'float',
        'is_active' => 'boolean',
        'attributes' => 'array',
        'quantity' => 'integer',
        'type' => 'integer',
    ];

    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, 'type', 'id');
    }

    protected static function booted(): void
    {
        static::updated(function (Product $product) {
            if ($product->wasChanged('special_price') || $product->wasChanged('price')) {
                self::updatePendingOrders($product);
            }
        });
    }

    private static function updatePendingOrders($product): void
    {
        $pendingOrders = Order::where('product_id', $product->id)
            ->where('status', 'pending')
            ->get();

        $amount = $product->special_price ?: $product->price;

        foreach ($pendingOrders as $order) {
            $order->update(['amount' => $amount]);

            event(new OrderUpdated($order));
        }
    }
}
