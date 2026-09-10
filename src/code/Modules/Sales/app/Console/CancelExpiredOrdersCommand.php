<?php

namespace Modules\Sales\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\DB;
use Modules\Sales\Models\Order;
use Modules\Sales\Events\OrderUpdated;
use Modules\Catalog\Models\Product;
use Modules\Catalog\Events\ProductUpdated;

class CancelExpiredOrdersCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'sales:cancel-expired-orders';

    /**
     * The console command description.
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle() {
        $expiredOrders = Order::where('status', Order::STATUS_PENDING)
            ->where('expires_at', '<=', now())
            ->get();

        if ($expiredOrders->isEmpty()) {
            return;
        }

        foreach ($expiredOrders as $order) {
            DB::transaction(function () use ($order) {
                $order->update(['status' => Order::STATUS_CANCELLED]);

                $product = Product::where('id', $order->product_id)->lockForUpdate()->first();
                if ($product) {
                    $product->increment('quantity', 1);
                    event(new ProductUpdated($product->fresh()));
                }
                event(new OrderUpdated($order->fresh()));
            });
        }

        $this->info("Отменено просроченных заказов: {$expiredOrders->count()}");
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
