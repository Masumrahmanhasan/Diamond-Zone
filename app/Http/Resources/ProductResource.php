<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'sku' => $this->sku,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'intl_info' => $this->intl_info,
            'price' => $this->price,
            'discounted_price' => $this->price - ( $this->price * ($this->discount / 100)),
            'discount' => $this->discount,
            'category'=> $this->category->name,
            'sub_category'=> $this->subcategory->name ?? null,
            'thumbnail' => $this->thumbnail,
            'gallary' => $this->gallary,
            'certificate' => $this->certificate,
            'status' => $this->status,
        ];
    }
}
