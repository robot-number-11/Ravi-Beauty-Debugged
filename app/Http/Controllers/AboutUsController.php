<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{

    public function __construct()
    {
        $publicPath = public_path("storage/database-images/about-us");

        $files = File::allFiles($publicPath);

        $banners = AboutUs::all()->toArray();


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
        $this->authorize("viewAny" , AboutUs::class);

        $about = AboutUs::all();

        return view("admin.admin-about-us.admin-aboutus" , compact("about"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize("create" , AboutUs::class);
        return view("admin.admin-about-us.admin-aboutus-create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize("create", AboutUs::class );
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:5000',
            'title' => 'required',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs("public/database-images/about-us" , $imageName);

        AboutUs::create([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description
        ]);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->route("admin-panel");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutUs $admin_about)
    {
        $this->authorize("update" , $admin_about);
        return view("admin.admin-about-us.admin-aboutus-edit" , compact("admin_about"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutUs $admin_about)
    {
        $this->authorize("update" , $admin_about);
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:5000',
            'title' => 'required',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs("public/database-images/about-us" , $imageName);

        $admin_about->update([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description
        ]);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->route("admin-panel");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutUs $admin_about)
    {
        $this->authorize("delete" , $admin_about);
        $admin_about->delete();
        return redirect()->route("admin-panel");
    }
}