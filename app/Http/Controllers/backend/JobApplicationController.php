<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobApplicationRequest;
use App\Http\Requests\UpdateJobApplicationRequest;
use App\Models\Candidate;
use App\Models\Career;
use App\Models\Job_Application;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Pagination
        //$Job_apps = Job_Application::paginate(5);
        $applications = Job_Application::with('career')->get();
        $careers = Career::all();
        return view('admin.jobapplications', compact('applications', 'careers'));
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
    public function store(StoreJobApplicationRequest $request)
    {
        try {
            $validated = $request->validated();
            $application = Job_Application::create($validated);

            if ($request->hasFile('image')) {
                $application->addMediaFromRequest('image')->toMediaCollection('application_images');
            }

            if ($request->hasFile('cv')) {
                $application->addMediaFromRequest('cv')->toMediaCollection('application_cv');
            }
            //return redirect()->route('Job_app.index');
            return redirect()->route('application.index')
                ->with('success_message', 'Application has been created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function storeNewApp(StoreJobApplicationRequest $request)
    {
        try {
            $validated = $request->validated();
            $application = Job_Application::create($validated);

            if ($request->hasFile('image')) {
                $application->addMediaFromRequest('image')->toMediaCollection('application_images');
            }

            if ($request->hasFile('cv')) {
                $application->addMediaFromRequest('cv')->toMediaCollection('application_cv');
            }
            //return redirect()->route('Job_app.index');
            return redirect()->view('frontend.sections.careers.ShowSingleCareer')
                ->with('success_message', 'Application has been created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Job_Application $job_Application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job_Application $job_Application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobApplicationRequest $request)
    {
        try {

            $validated = $request->validated();
            $application = Job_Application::findOrFail($request->id);
            $application->update($validated);

            if ($request->hasFile('image')) {
                $application->addMediaFromRequest('image')->toMediaCollection('application_images');
            }

            if ($request->hasFile('cv')) {
                $application->addMediaFromRequest('cv')->toMediaCollection('application_cv');
            }
            //return redirect()->route('Job_app.index');
            return redirect()->route('application.index')
                ->with('success_message', 'Application has been updated successfully!');
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
        Job_Application::findOrFail($request->id)->forceDelete();
        //return redirect()->route('job_app.index');
        return redirect()->route('application.index')
            ->with('success_message', 'Application has been deleted successfully!');
    }


    public function promoteToCandidate($id)
    {
        $jobApplication = Job_Application::findOrFail($id);

        // Create Candidate from Job Application
        $candidate = Candidate::create([
            'career_id'         => $jobApplication->career_id,
            'job_application_id'=> $jobApplication->id,
            'first_name'        => $jobApplication->first_name,
            'last_name'         => $jobApplication->last_name,
            'email'             => $jobApplication->email,
            'phone'             => $jobApplication->phone,
            'country'           => $jobApplication->country,
            'city'              => $jobApplication->city,
            'linkedin'          => $jobApplication->linkedin,
            'github'            => $jobApplication->github,
            'behance'           => $jobApplication->behance,
            'is_hired'          => 0,
        ]);

        if ($jobApplication->hasMedia('application_images')) {
            $jobApplication->getFirstMedia('application_images')
                ->copy($candidate, 'candidate_images');
        }

        if ($jobApplication->hasMedia('application_cv')) {
            $jobApplication->getFirstMedia('application_cv')
                ->copy($candidate, 'candidate_cv');
        }

        $jobApplication->delete();
        // Optional: update job application status
        // $jobApplication->update(['status' => 'promoted']);

        return response()->json([
            'success' => true,
            'message' => 'Job Application promoted to Candidate successfully.',
            'candidate_id' => $candidate->id
        ]);
    }


}
