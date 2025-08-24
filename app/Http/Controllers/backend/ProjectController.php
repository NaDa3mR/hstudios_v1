<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(4);
        return view('frontend.projects', compact('projects'));

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
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(Project $project)
    // {
    //     $view = $project->view_name;
    //     $view = preg_replace('/\.blade\.php$/i', '', $view);
    //     $view = str_replace(['/', '\\'], '.', $view);
    //     $view = ltrim($view, '.');
    //     $view = "frontend.sections.projects." . $view;

    //     if (!view()->exists($view)) {
    //         abort(404, "View not found: {$view}");
    //     }

    //     return view($view, ['project' => $project]);
    // }
    public function show(Project $project)
{
    $view = 'frontend.sections.projects.' . $project->view_name;

    if (!view()->exists($view)) {
        abort(404, "View not found: {$view}");
    }

    return view($view, ['project' => $project]);
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
