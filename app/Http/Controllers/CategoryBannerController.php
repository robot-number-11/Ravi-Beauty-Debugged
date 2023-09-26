<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryBanner;
use Illuminate\Support\Facades\File;

class CategoryBannerController extends Controller
{

    public function __construct()
    {
        $publicPath = public_path("storage/database-images/category");

        $files = File::allFiles($publicPath);

        $banners = CategoryBanner::all()->toArray();


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
        $this->authorize("vieweAny" , CategoryBanner::class);
        $categories = CategoryBanner::all();

        return view("admin.admin-category-banner.admin-categories" , compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create" , CategoryBanner::class);

        return view("admin.admin-category-banner.admin-category-create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("create" , CategoryBanner::class);

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            'title' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs("public/database-images/category" , $imageName);

        $data = CategoryBanner::create([
            'title' => $request->title,
            'image' => $imageName,
        ]);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->route("admin-panel");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryBanner $admin_category)
    {
        $this->authorize("edit" , $admin_category);

        return view("admin.admin-category-banner.admin-category-edit" , compact("admin_category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryBanner $admin_category)
    {
        $this->authorize("edit" , $admin_category);

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs("public/database-images/category" , $imageName);

        $admin_category->update([
            'title' => $request->title,
            'image' => $imageName,
        ]);

        return redirect()->route("admin-panel");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryBanner $admin_category)
    {
        $this->authorize("delete" , $admin_category);

        $admin_category->delete();
        return redirect()->route("admin-panel");
        
    }
}
