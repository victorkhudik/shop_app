<?php

namespace Modules\Sales\Models;

use Illuminate\Database\Eloquent\Model;

class ProductKey extends Model
{
    protected $table = 'product_keys';

    protected $fillable = [
        'key_value',
        'is_issued',
        'order_id',
    ];
}
