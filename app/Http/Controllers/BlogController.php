<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    public function __construct()
    {
        $publicPath = public_path("storage/database-images/blog");

        $files = File::allFiles($publicPath);

        $banners = Blog::all()->toArray();


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

    public function index()
    {
        $posts = Blog::paginate(3);

        return view("blog.all-weblog-posts" , compact("posts"));

    }

    public function show(Blog $blog)
    {
        return view("blog.singel-weblog-post" , compact("blog"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {

        $this->authorize("is_admin" , $user);

        return view("blog.weblog-post-create" , compact("user"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , User $user)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:5000',
            'title' => 'required',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs("public/database-images/blog" , $imageName);

        $data = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'image' => $imageName,
        ]);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->route("blog.index");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $this->authorize("update" , $blog);
        return view("blog.weblog-post-edit" , compact("blog"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $this->authorize("update" , $blog);
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,webp,svg|max:5000',
            'title' => 'required',
            'description' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs("/public/database-images/blog" , $imageName);

        $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'image' => $imageName,
        ]);

        session()->flash('success', 'Image Upload successfully');

        return redirect()->route("blog.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->authorize("update" , $blog);
        $blog->delete();
        return redirect()->route("blog.index");
    }
}
