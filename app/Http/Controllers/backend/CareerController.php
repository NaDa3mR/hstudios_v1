<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Pagination
        // $careers = Career::paginate(5);
        //return view('backend.career.show', compact('Careers'))
        $careers = Career::all();
        return view('admin.careers', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function show($id)
    {
      $career = Career::findOrFail($id);
      return view('frontend.sections.careers.ShowSingleCareer', compact('career'));
    }
    public function showAll(Request $request)
    {
      $careers = Career::all();
      return view('frontend.career', compact('careers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerRequest $request)
    {
        try {
            $validated = $request->validated();
            Career::create($validated);
            //return redirect()->route('career.index');
            return redirect()->route('career.index')
                ->with('success_message', 'Career has been created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function toggleActive(Request $request, $id)
    {
        $career = Career::findOrFail($id);
        $career->is_active = $request->is_active;
        $career->save();

        return response()->json(['success' => true]);
    }

    public function togglePublished(Request $request, $id)
    {
        $career = Career::findOrFail($id);
        $career->is_published = $request->is_published;
        $career->save();

        return response()->json(['success' => true]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerRequest $request)
    {
        try {

            $validated = $request->validated();
            $Career = Career::findOrFail($request->id);
            $Career->update($validated);
            //return redirect()->route('career.index');
            return redirect()->route('career.index')
                ->with('success_message', 'Career has been updated successfully!');
        } catch
        (\Exception $e) {
            return redirect()->back()->
                withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Career = Career::findOrFail($request->id)->delete();
        //return redirect()->route('career.index');
        return redirect()->route('career.index')
            ->with('success_message', 'Career has been deleted successfully!');
    }



}
