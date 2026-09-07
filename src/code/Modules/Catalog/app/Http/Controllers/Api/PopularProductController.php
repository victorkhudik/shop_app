<?php

namespace Modules\Catalog\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Modules\Catalog\Models\ProductType;
use Modules\Catalog\Transformers\GroupedPopularProductsResource;

class PopularProductController extends Controller
{
    public function index()
    {
        $groupedProducts = ProductType::whereHas('products', function ($query) {
            $query->where('is_active', true);
        })
            ->with(['popularProducts'=> function ($query) {
                $query->where('is_active', true)
                    ->orderBy('sales', 'desc');
            }])
            ->get();

        return GroupedPopularProductsResource::collection($groupedProducts);
    }
}
