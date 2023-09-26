<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function __construct()
    {
        $publicPath = public_path("storage/database-images/brand");

        $files = File::allFiles($publicPath);

        $banners = Brand::all()->toArray();


        foreach ($files as $file) {

            $filename = basename($file);

            $matched = 0;

            foreach ($banners as $banner) {
                if($filename == $banner["image"]){
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
        $this->authorize("veiwAny" , Brand::class);
        $brands = Brand::all();

        return view("admin.admin-brand.admin-brands" , compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create" , Brand::class);

        return view("admin.admin-brand.admin-brand-create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("create" , Brand::class);

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:5000',
            'brand' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs("public/database-images/brand" , $imageName);

        $data = Brand::create([
            'brand' => $request->brand,
            'image' => $imageName,
        ]);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->route("admin-panel");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $admin_brand)
    {
        $this->authorize("update" , $admin_brand);

        return view("admin.admin-brand.admin-brand-edit" , compact("admin_brand"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $admin_brand)
    {
        $this->authorize("update" , $admin_brand);

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:5000',
            'brand' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs("public/database-images/brand" , $imageName);

        $admin_brand->update([
            'brand' => $request->brand,
            'image' => $imageName,
        ]);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->route("admin-panel");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $admin_brand)
    {
        $this->authorize("delete" , $admin_brand);

        $admin_brand->delete();
        return redirect()->route("admin-panel");
    }
}
