<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
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
        //return view('backend.job_app.show', compact('Job_apps'))
        $Job_apps = Job_Application::all();
        //return view('backend.job_app.show',compact('Job_apps'));
        return $Job_apps;
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
            Job_Application::create($validated);
            //return redirect()->route('Job_app.index');
            return view('frontend.job_app.showForm')
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
    public function update(Request $request)
    {
        try {

            $validated = $request->validated();
            $Job_app = Job_Application::findOrFail($request->id);
            $Job_app->update($validated);
            //return redirect()->route('Job_app.index');
            return redirect()->route('job_app.index')
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
        $Job_app = Job_Application::findOrFail($request->id)->delete();
        //return redirect()->route('job_app.index');
        return redirect()->route('job_app.index')
            ->with('success_message', 'Application has been deleted successfully!');
    }
}
