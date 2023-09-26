<?php

namespace App\Http\Controllers;

use App\Models\HeaderBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeaderBannerController extends Controller
{

    public function __construct()
    {
        $publicPath = public_path("storage/database-images/banner");

        $files = File::allFiles($publicPath);

        $banners = HeaderBanner::all()->toArray();


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
        $this->authorize("viewAny" , HeaderBanner::class);
        $banners = HeaderBanner::all();

        return view("admin.admin-header-banner.admin-banners" , compact("banners"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create" , HeaderBanner::class);

        return view("admin.admin-header-banner.admin-banner-create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("create" , HeaderBanner::class);

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,webp,jpeg,gif,svg|max:5000',
            'title' => 'required',
            'description' => "required",
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs("public/database-images/banner" , $imageName);

        $data = HeaderBanner::create([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->route("admin-panel");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeaderBanner $admin_banner)
    {
        $this->authorize("edit" , $admin_banner);


        return view("admin.admin-header-banner.admin-banner-edit" , compact("admin_banner"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HeaderBanner $admin_banner)
    {
        $this->authorize("edit" , $admin_banner);

        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,webp,gif,svg|max:5000',
            'title' => 'required',
            'description' => "required",
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs("public/database-images/banner" , $imageName);

        $admin_banner->update([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        return redirect()->route("admin-panel");


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeaderBanner $admin_banner)
    {
        $this->authorize("delete" , $admin_banner);

        $admin_banner->delete();
        return redirect()->route("admin-panel");
    }
}
