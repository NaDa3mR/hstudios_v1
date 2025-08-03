<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services', compact('services'));

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
    public function store(StoreServiceRequest $request)
    {
        try {
            $validated = $request->validated();

            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;

            while (Service::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $validated['slug'] = $slug;

            Service::create($validated);

            return redirect()->route('service.index')
                ->with('success_message', 'Service created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function showServices()
    {
        $services = Service::paginate(5);
        return view('frontend.service.show', compact('services'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        try {
            // Validate input first
            $validated = $request->validated();

            // Generate slug based on updated title
            $slug = Str::slug($validated['title']);
            $originalSlug = $slug;
            $counter = 1;

            while (
                Service::where('slug', $slug)
                    ->where('id', '!=', $service->id)
                    ->exists()
            ) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $validated['slug'] = $slug;

            $service->update($validated);

            return redirect()->route('service.index')
                ->with('success_message', 'Service updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $service = Service::findOrFail($request->id)->delete();
        return redirect()->route('service.index')
            ->with('success_message', 'Service has been deleted successfully!');
        ;
    }
}
