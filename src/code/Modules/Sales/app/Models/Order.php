<?php

namespace Modules\Sales\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Catalog\Models\Product;
use Modules\Sales\Models\ProductKey;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'uuid',
        'product_id',
        'amount',
        'status',
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
