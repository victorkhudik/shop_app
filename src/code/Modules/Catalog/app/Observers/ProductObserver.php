<?php

namespace Modules\Catalog\Observers;

use Modules\Catalog\Models\Product;
use Modules\Catalog\Events\ProductUpdated;

class ProductObserver
{
    public function updated(Product $product): void
    {
        if ($product->wasChanged(['price', 'special_price', 'quantity'])) {
            event(new ProductUpdated($product));
        }
    }
}
