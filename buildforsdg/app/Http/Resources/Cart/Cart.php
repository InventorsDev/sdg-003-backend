<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Resources\Json\JsonResource;

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
       return [
           'quantity'=> $this->quantity,
           'unit_price'=> $this->unit_price,
           'amount'=> $this->amount,
           'user_id'=> $this->user_id,
           'product_id'=> $this->product_id,
       ];
    }
}
