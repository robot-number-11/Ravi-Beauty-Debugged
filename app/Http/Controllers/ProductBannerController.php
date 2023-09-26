<?php

namespace App\Http\Controllers;

use App\Models\ProductBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductBannerController extends Controller
{

    public function __construct()
    {
        $publicPath = public_path("storage/database-images/product");

        $files = File::allFiles($publicPath);

        $products = ProductBanner::all()->toArray();


        foreach ($files as $file) {

            $filename = basename($file);

            $matched = 0;

            foreach ($products as $product) {
                if($filename == $product["image"]){
                    $matched = 1;
                    break;
                }
            }


            if($matched == 0){
                File::delete($file);
            }

        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize("viewAny" , ProductBanner::class);
        $products = ProductBanner::all();

        return view("admin.admin-product.admin-products" , compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create" , ProductBanner::class);

        return view("admin.admin-product.admin-product-create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("create" , ProductBanner::class);

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,webp,gif,svg|max:2048',
            'title' => 'required',
            'price' => "required|numeric",
            'category' => 'required'
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs("public/database-images/product" , $imageName);

        ProductBanner::create([
            'title' => $request->title,
            'image' => $imageName,
            'price' => $request->price,
            'category' => $request->category
        ]);

        return redirect()->route("admin-panel");
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductBanner $admin_product)
    {
        $this->authorize("edit" , $admin_product);

        return view("admin.admin-product.admin-product-edit" , compact("admin_product"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductBanner $admin_product)
    {
        $this->authorize("edit" , $admin_product);

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,webp,gif,svg|max:2048',
            'title' => 'required',
            'price' => "required|numeric",
            'category' => 'required'
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs("public/database-images/product" , $imageName);

        $admin_product->update([
            'title' => $request->title,
            'image' => $imageName,
            'price' => $request->price,
            'category' => $request->category
        ]);

        return redirect()->route("admin-panel");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductBanner $admin_product)
    {
        $this->authorize("delete" , $admin_product);

        $admin_product->delete();
        return redirect()->route("admin-panel");
    }
}
