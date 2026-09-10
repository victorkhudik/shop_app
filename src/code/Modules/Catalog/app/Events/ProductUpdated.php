<?php
// Modules/Catalog/Events/ProductUpdated.php

namespace Modules\Catalog\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Catalog\Models\Product;

class ProductUpdated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Product $product) {}

    public function broadcastOn(): array
    {
        return [
            new Channel('catalog')
        ];
    }

    public function broadcastAs(): string
    {
        return 'product.updated';
    }

    public function broadcastWith(): array
    {
        return [
            'id' => $this->product->id,
            'price' => $this->product->price,
            'special_price' => $this->product->special_price,
            'quantity' => $this->product->quantity,
            'is_available' => $this->product->quantity > 0,
        ];
    }
}
