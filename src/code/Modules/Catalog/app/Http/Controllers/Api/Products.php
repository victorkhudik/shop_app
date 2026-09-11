<?php

namespace Modules\Catalog\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Catalog\Models\Product;
use Modules\Catalog\Transformers\ProductResource;
class Products extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->query('query', ''));
        $limit = (int) config('catalog.search_limit', 50);

        $queryBuilder = Product::query()
            ->where('is_active', true);

        if (!empty($search)) {
            $queryBuilder->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('sku', 'LIKE', "%{$search}%");
            });
        }

        $total = $queryBuilder->count();
        $products = $queryBuilder->limit($limit)->get();

        return ProductResource::collection($products)->additional([
            'meta' => [
                'total' => $total,
                'limit' => $limit,
            ]
        ]);
    }
}
