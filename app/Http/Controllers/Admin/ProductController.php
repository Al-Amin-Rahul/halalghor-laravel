<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["products"] = Product::with("category")->orderBy("id", "desc")->get();

        return view("admin.product.manege-product", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["categories"] = Category::all();
        return view("admin.product.add-product", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "name" => "required",
            "category_id" => "required",
            "code" => "required",
            "price" => "required",
            "description" => "required",
            "product_feature" => "required"
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            if ($request->hasFile("banner"))
            {
                $image = $request->file("banner");
                $directory = "product-image/";
                $name = random_int(100, 1000).".".$image->getClientOriginalExtension();

                $image->move($directory, $name);

                $imageURL = $directory.$name;

                Product::create([
                    "name" => $request->name,
                    "category_id" => $request->category_id,
                    "code" => $request->code,
                    "price" => $request->price,
                    "description" => $request->description,
                    "product_feature" => $request->product_feature,
                    "popular" => $request->popular,
                    "offer" => $request->offer,
                    "offer_ratio" => $request->offer_ratio,
                    "publication_status" => $request->publication_status,
                    "banner" => $imageURL,
                ]);

                return redirect()->route("admin.product.index");
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data["product"] = Product::find($id);
        $data["categories"] = Category::all();

        return view("admin.product.edit-product", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            "name" => "required",
            "category_id" => "required",
            "code" => "required",
            "price" => "required",
            "description" => "required",
            "product_feature" => "required"
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else
        {
            $product = Product::find($id);

            if ($request->hasFile("banner"))
            {
                $image = $request->file("banner");

                Storage::delete($product->banner);

                $directory = "image/";
                $name = random_int(100, 1000).".".$image->getClientOriginalExtension();
                $image->move($directory, $name);

                $imageURL = $directory.$name;

            }
            else {
                $imageURL = $product->banner;
            }

            $product->update([
                "name" => $request->name,
                "category_id" => $request->category_id,
                "code" => $request->code,
                "price" => $request->price,
                "description" => $request->description,
                "product_feature" => $request->product_feature,
                "popular" => $request->popular,
                "offer" => $request->offer,
                "offer_ratio" => $request->offer_ratio,
                "publication_status" => $request->publication_status,
                "banner" => $imageURL,
            ]);

            $this->setSuccessMessage("Product update successfully");
            return redirect()->route("admin.product.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        Storage::delete($product->banner);
        $product->delete($id);

        $this->setSuccessMessage("Product delete successfully");
        return redirect()->route("admin.product.index");
    }
}
