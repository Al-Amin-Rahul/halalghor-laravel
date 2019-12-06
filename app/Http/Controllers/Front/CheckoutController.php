<?php

namespace App\Http\Controllers\Front;


use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use App\Notifications\NotifyAdmin;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $data["carts"] = Cart::content();
        return view("front.confirm-order.confirm_order" , $data);
    }


    public function saveOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name"         => "required",
            "phone_number" => "required|min:11|max:13",
            "address"      => "required",
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $order = Order::create([
            "name" => $request->name,
            "phone_number" => $request->phone_number,
            "address" => $request->address,
            "total_price" => session()->get("total_price"),
            "payment_status" => "Pending",
        ]);

        $cartProducts = Cart::content();
        foreach ($cartProducts as $cartProduct)
        {
            OrderProduct::create([
                "order_id"   => $order->id,
                "product_id" => $cartProduct->id,
                "price"      => $cartProduct->price,
                "quantity"   => $cartProduct->qty
            ]);
        }

        Cart::destroy();
        $this->setSuccessMessage("আসসালামুয়াইকুম , আপনার আডারটি সম্পন্ন হয়েছে। খুব তারাতাড়ি আপনার সাথে যোগাযোগ করা হবে ইনশাআল্লাহ্‌।");
        return redirect()->route("/");
    }
}
