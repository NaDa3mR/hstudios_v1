<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use App\Models\Career;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Pagination
        //$Candidates = Candidate::paginate(5);
        //return view('backend.candidate.show', compact('Candidates'))
        $candidates = Candidate::with('career')->get();
        $careers = Career::all();
        return view('admin.candidates', compact('candidates', 'careers'));
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
    public function store(StoreCandidateRequest $request)
    {
        try {
            $validated = $request->validated();
            $candidate = Candidate::create($validated);
            //return redirect()->route('candidate.index');

            if ($request->hasFile('cv')) {
                $candidate->addMediaFromRequest('cv')->toMediaCollection('candidate_cv');
            }

            if ($request->hasFile('image')) {
                $candidate->addMediaFromRequest('image')->toMediaCollection('candidate_images');
            }

            return redirect()->route('candidate.index')
                ->with('success_message', 'Candidate has been created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCandidateRequest $request)
    {
        try {

            $validated = $request->validated();
            $candidate = Candidate::findOrFail($request->id);
            $candidate->update($validated);
            
            if ($request->hasFile('cv')) {
                $candidate->addMediaFromRequest('cv')->toMediaCollection('candidate_cv');
            }

            if ($request->hasFile('image')) {
                $candidate->addMediaFromRequest('image')->toMediaCollection('candidate_images');
            }

            //return redirect()->route('candidate.index');
            return redirect()->route('candidate.index')
                ->with('success_message', 'Candidate has been updated successfully!');
        } catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function toggleHired(Request $request, $id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->is_hired = $request->input('is_hired');
        $candidate->save();

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Candidate::findOrFail($request->id)->delete();
        //return redirect()->route('candidate.index');
        return redirect()->route('candidate.index')
            ->with('success_message', 'Candidate has been deleted successfully!');
    }
}
