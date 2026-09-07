<?php

namespace Modules\Catalog\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductType extends Model
{
    protected $table = 'product_types';

    protected $fillable = ['name'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'type_id', 'id');
    }

    public function popularProducts(): HasMany
    {
        return $this->hasMany(Product::class, 'type_id', 'id')
            ->where('is_active', true)
            ->latest()
            ->limit(5);
    }
}
