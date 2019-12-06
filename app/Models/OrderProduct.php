<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderProduct
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property float $price
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Product $products
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Product $product
 */
class OrderProduct extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }



//    public function newOrderProductInfoSave($orderProduct, $order, $cartProduct)
//    {
//        $orderProduct->order_id   = $order->id;
//        $orderProduct->product_id = $cartProduct->id;
//        $orderProduct->price = $cartProduct->price;
//        $orderProduct->quantity = $cartProduct->qty;
//
//        $orderProduct->save();
//    }
}
