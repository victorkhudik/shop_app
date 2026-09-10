<?php

namespace Modules\Sales\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Catalog\Models\Product;
use Modules\Sales\Models\ProductKey;

class Order extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_PAID = 'paid';
    const STATUS_COMPLETED = 'completed';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FAILED = 'failed';

    protected $table = 'orders';
    protected $fillable = [
        'uuid',
        'product_id',
        'amount',
        'status',
        'expires_at',
    ];

    protected $casts = [
        'amount' => 'float',
        'expires_at' => 'datetime',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function key()
    {
        return $this->hasOne(ProductKey::class, 'order_id');
    }
}
