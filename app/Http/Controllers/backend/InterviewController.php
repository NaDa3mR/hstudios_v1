<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInterviewRequest;
use App\Http\Requests\UpdateInterviewRequest;
use App\Models\Interview;
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
        //return view('backend.interview.show', compact('Interviews'))
        $Interviews = Interview::all();
        //return view('backend.interview.show',compact('Interviews'));
        return $Interviews;
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

            $application = JobApplication::findOrFail($validated['job_application_id']);

            $application->interviews()->create($validated);

            return redirect()->route('job_app.index')
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
            $Interview = Interview::findOrFail($request->id);
            $Interview->update([
                'job_application_id' => $request->job_application_id,
                'type' => $request->type,
                'interview_date' => $request->interview_date,
                'duration' => $request->duration,
                'details' => $request->details,
            ]);
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
        $Interview = Interview::findOrFail($request->id)->delete();
        //return redirect()->route('interview.index');
        return redirect()->route('interview.index')
            ->with('success_message', 'Interview has been deleted successfully!');
    }
}
