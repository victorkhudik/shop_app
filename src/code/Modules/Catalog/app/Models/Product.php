<?php

namespace Modules\Catalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
