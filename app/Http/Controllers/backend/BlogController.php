<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //Pagination
      //$Blogs = Blog::paginate(5);
      //return view('backend.blog.show', compact('Blogs'))
      $Blogs = Blog::all();
      //return view('backend.blog.show',compact('Blogs'));
      return $Blogs;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validated();
            $Blog = new Blog();                          
            $Blog->title = $request->title;
            $Blog->sub_title = $request->sub_title;
            $Blog->slug = $request->slug;
            $Blog->meta_keyword = $request->meta_keyword;
            $Blog->meta_description = $request->meta_description;
            $Blog->meta_title = $request->meta_title;
            $Blog->details = $request->details;
            $Blog->is_active = $request->is_active;
            $Blog->save();
            //return redirect()->route('blog.index');
            return redirect()->route('blog.index')
            ->with('success_message', 'Blog has been created successfully!');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $Blog = Blog::findOrFail($request->id);
        return view('backend.blog.show',compact('Blog'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {

            $validated = $request->validated();
            $Blog = Blog::findOrFail($request->id);
            $Blog->update([                  
            $Blog->title = $request->title,
            $Blog->sub_title = $request->sub_title,
            $Blog->slug = $request->slug,
            $Blog->meta_keyword = $request->meta_keyword,
            $Blog->meta_description = $request->meta_description,
            $Blog->meta_title = $request->meta_title,
            $Blog->details = $request->details,
            $Blog->is_active = $request->is_active,
            ]);
            //return redirect()->route('blog.index');
            return redirect()->route('blog.index')
            ->with('success_message', 'Blog has been updated successfully!');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Blog = Blog::findOrFail(request->id)->delete();
        //return redirect()->route('blog.index');
        return redirect()->route('blog.index')
        ->with('success_message', 'Blog has been deleted successfully!');
    }
}
