<?php

namespace Modules\Catalog\Http\Controllers\Api;


use Illuminate\Routing\Controller;
use Modules\Catalog\Models\Product;
use Modules\Catalog\Transformers\ProductResource;
class RecommendedProducts extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)
            ->orderBy('sales', 'desc')
            ->limit(5)
            ->get();

        return ProductResource::collection($products);
    }
}
