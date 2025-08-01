<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
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
        $blogs = Blog::all();
        return view('admin.blogs', compact('blogs'));
        //return $Blogs;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.blogs.add_blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        try {
            $validated = $request->validated();
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;

            while (Blog::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $validated['slug'] = $slug;
            Blog::create($validated);
            //return redirect()->route('blog.index');
            return redirect()->route('blog.index')
                ->with('success_message', 'Blog has been created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.sections.blogs.show-blog-info', compact('blog'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.sections.blogs.update_blog', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        try {

            $validated = $request->validated();
            // $Blog = Blog::findOrFail($blog);
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;
            while (
                Blog::where('slug', $slug)
                    ->where('id', '!=', $blog->id)

                    ->exists()
            ) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $validated['slug'] = $slug;
            $blog->update($validated);
            //return redirect()->route('blog.index');
            return redirect()->route('blog.index')
                ->with('status', 'blog-updated');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function toggleStatus(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->is_active = $request->is_active;

        $blog->save();

        return response()->json(['message' => 'Status updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Blog = Blog::findOrFail($request->id)->delete();
        //return redirect()->route('blog.index');
        return redirect()->route('blog.index')
            ->with('success_message', 'Blog has been deleted successfully!');
    }
}
