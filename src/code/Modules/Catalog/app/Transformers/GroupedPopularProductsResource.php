<?php

namespace Modules\Catalog\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
class GroupedPopularProductsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'product_type' => [
                'id' => $this->id,
                'name' => $this->name,
            ],
            'products' => ProductResource::collection($this->whenLoaded('popularProducts')),
        ];
    }
}
