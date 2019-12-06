<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $data["categories"] = Category::with("products")->select(["id", "name", "slug"])->where("publication_status", 1)->orderBy('id', 'DESC')->get();
        $data["offer_products"] = Product::select(["id", "name", "slug", "price", "banner", "offer_ratio"])->where("publication_status", 1)->where("offer", 1)->orderBy('id', 'DESC')->take(4)->get();
        $data["popular_products"] = Product::select(["id", "name", "slug", "price", "banner"])->where("publication_status", 1)->where("popular", 1)->orderBy('id', 'DESC')->take(4)->get();
//        return $data;
        return view("front.home.home", $data);
    }

    public function categoryProducts($slug)
    {
        $data["category_products"] = Category::with("products")->where("slug", $slug)->orderBy('id', 'DESC')->take(4)->get();

        $data["offer_products"] = Product::select(["id", "name", "slug", "price", "banner", "offer_ratio"])->where("publication_status", 1)->where("offer", 1)->orderBy('id', 'DESC')->take(4)->get();

        return view('front.product-category.product_category', $data);
    }

    public function productDetails($slug)
    {
        $data["product"] = Product::all()->where("slug", $slug)->first();

        $data["similar_product"] = Category::with("products")->where("id", $data["product"]->category_id)->orderBy('id', 'DESC')->take(4)->first();

        $data["comments"] = Comment::with("product")->where("product_id", $data["product"]->id)->where("active", 1)->orderBy('id', 'DESC')->get();
//        return $data["comments"];
        return view("front.product-details.product_details", $data);
    }

    public function offerProductShow(){
        $data["offer_products"] = Product::select(["id", "name", "slug", "price", "banner", "offer_ratio"])->where("publication_status", 1)->where("offer", 1)->orderBy('id', 'DESC')->get();
        $data["popular_products"] = Product::select(["id", "name", "slug", "price", "banner"])->where("publication_status", 1)->where("popular", 1)->orderBy('id', 'DESC')->take(4)->get();

        return view("front.offer-products.offer-products", $data);
    }

    public function popularProductShow(){
        $data["popular_products"] = Product::select(["id", "name", "slug", "price", "banner"])->where("publication_status", 1)->where("popular", 1)->orderBy('id', 'DESC')->get();
        $data["offer_products"] = Product::select(["id", "name", "slug", "price", "banner", "offer_ratio"])->where("publication_status", 1)->where("offer", 1)->orderBy('id', 'DESC')->take(4)->get();

        return view("front.popular-products.popular-products", $data);
    }

    public function saveComment(Request $request){
        $validator = Validator::make($request->all(), [
            "name"    => "required",
            "email"   => "required|email",
            "comment" => "required",
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $comment = new Comment();
            $comment->newCommentsave($request, $comment);

            return redirect()->back();
        }
    }

    public function aboutUs(){
        return view('front.information.about_us');
    }

    public function contactUs(){
        return view('front.information.contact_us');
    }

    public function securityPolicy(){
        return view('front.customer-service.security_policy');
    }

    public function shippingAndReplace(){
        return view('front.customer-service.shipping_and_replacement');
    }

    public function privacyPolicy(){
        return view('front.customer-service.privacy_policy');
    }

    public function termOfUse(){
        return view('front.customer-service.terms_of_use');
    }

    public function developerInfo(){
        return view('front.developer_info.developer_info');
    }
}
