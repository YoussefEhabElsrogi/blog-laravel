<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'myBlogs']);
    }
    /**
     * Display a listing of the resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('theme.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $validatedData = $request->validated();

        // image uploading
        // 1- get imgage
        $image = $request->image;
        // 2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- move image to my project
        $image->storeAs('blogs', $newImageName, 'public');
        // 4- save new name to database record
        $validatedData['image'] = $newImageName;

        $validatedData['user_id'] = Auth::user()->id;

        // create new blog record
        Blog::create($validatedData);

        // return message
        return back()->with('status', 'Your blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.single-blog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {

        if ($blog->user_id  == Auth::user()->id) :
            $categories = Category::get();
            return view('theme.blogs.edit', compact('categories', 'blog'));
        endif;

        abort(304);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {

        if ($blog->user_id  == Auth::user()->id) :

            $validatedData = $request->validated();

            // chekc photo is found or not  => if has image uploading... or isn't imgage updated

            if ($request->hasFile('image')) :

                // image uploading
                // 1- delete old image
                Storage::delete("public/blogs/$blog->image");
                // 2- get imgage
                $image = $request->image;
                // 3- change it's current name
                $newImageName = time() . '-' . $image->getClientOriginalName();
                // 4- move image to my project
                $image->storeAs('blogs', $newImageName, 'public');
                // 5- save new name to database record
                $validatedData['image'] = $newImageName;
                // 6- delete old image
                Storage::delete("public/blogs/$blog->image");

            endif;

            // update user blog
            $blog->update($validatedData);

            // return message
            return back()->with('updateData', 'Your blog updated successfully');
        endif;

        abort(304);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {

        if ($blog->user_id  == Auth::user()->id) :

            // delete image
            Storage::delete("public/blogs/$blog->image");

            $blog->delete();

            return back()->with('deleteBlog', "The $blog->name blog was deleted successfully");
        endif;

        abort(403);
    }

    /**
     * Display all user blogs
     */
    public function myBlogs()
    {
        // First Mehod
        $blogs = Blog::where('user_id', Auth::user()->id)->paginate(10);

        // Second Method

        // $user = Auth::user(); // id = 7

        // $blogs = $user->blogs;

        return view('theme.blogs.my_blogs', compact('blogs'));
    }
}
