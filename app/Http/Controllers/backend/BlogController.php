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
            $blog = Blog::create($validated);

            if ($request->hasFile('image')) {
                $blog->addMediaFromRequest('image')->toMediaCollection('blog_images');
            }
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
    public function showSingleBlog(Request $request)
    {
        $blog = Blog::findOrFail($request->id);
        $previous = Blog::where('id', '<', $blog->id)->orderBy('id', 'desc')->first();
        $next = Blog::where('id', '>', $blog->id)->orderBy('id', 'asc')->first();
        return view('frontend.sections.blogs.ShowSingleBlog', compact('blog' , 'previous', 'next'));
    }

    public function showAll()
    {
        $blogs = Blog::where('is_active', 1)->paginate(4);
    //    $blogs = Blog::paginate(4);
        // $blogs = Blog::where('is_active', 1)->get();
        return view('frontend.blog', compact('blogs'));
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
            $slug = Str::slug($blog->title);
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
            if ($request->hasFile('image')) {
                $blog->clearMediaCollection('blog_images');
                $blog->addMediaFromRequest('image')->toMediaCollection('blog_images');
            }
            return redirect()->route('blog.index')
                ->with('success_message', 'Blog has been updated successfully!');
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
        Blog::findOrFail($request->id)->delete();
        //return redirect()->route('blog.index');
        return redirect()->route('blog.index')
            ->with('success_message', 'Blog has been deleted successfully!');
    }

    public function deleteImage(Blog $blog)
    {
        $blog->clearMediaCollection('blog_images');

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

}
