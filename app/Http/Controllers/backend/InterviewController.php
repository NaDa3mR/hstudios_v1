<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInterviewRequest;
use App\Http\Requests\UpdateInterviewRequest;
use App\Models\Candidate;
use App\Models\Career;
use App\Models\Interview;
use App\Models\Job_Application;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Pagination
        //$Interviews = Interview::paginate(5);
        $interviews = Interview::with('career', 'candidate')->get();
        $careers = Career::all();
        $candidates = Candidate::all();
        return view('admin.interviews', compact('interviews', 'careers', 'candidates'));
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
    public function store(StoreInterviewRequest $request)
    {
        try {
            $validated = $request->validated();
            Interview::create($validated);
            return redirect()->route('interview.index')
                ->with('success_message', 'Interview has been created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Interview $interview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Interview $interview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInterviewRequest $request)
    {
        try {

            $validated = $request->validated();
            $interview = Interview::findOrFail($request->id);
            $interview->update($validated);
            //return redirect()->route('interview.index');
            return redirect()->route('interview.index')
                ->with('success_message', 'Interview has been updated successfully!');
        } catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Interview::findOrFail($request->id)->delete();
        //return redirect()->route('interview.index');
        return redirect()->route('interview.index')
            ->with('success_message', 'Interview has been deleted successfully!');
    }

    public function getCandidatesByCareer($careerId)
    {
        $candidates = Candidate::where('career_id', $careerId)
            ->get(['id', 'first_name', 'last_name']);

        return response()->json($candidates);
    }


}
