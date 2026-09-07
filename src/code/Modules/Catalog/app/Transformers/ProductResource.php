<?php

namespace Modules\Catalog\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sku' => $this->sku,
            'slug' => $this->slug,
            'image' => $this->image ? asset($this->image) : null,
            'price' => $this->price,
            'special_price' => $this->special_price,
            'quantity' => $this->quantity,
        ];
    }
}
