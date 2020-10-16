<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CartItem as CartItemResource;

class Cart extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'subtotal' => number_format($this->subtotal, 0),
            'shipping_fee' => number_format($this->shipping_fee, 0),
            'total' => number_format($this->total, 0),
            'cart_items' => CartItemResource::collection($this->cart_items)
        ];
    }
}
