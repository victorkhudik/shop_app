<?php

namespace Modules\Catalog\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use Modules\Catalog\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->get();

        return response()->json($categories);
    }
}
