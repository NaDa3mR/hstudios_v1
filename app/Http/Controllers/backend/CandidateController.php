<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
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
      $Candidates = Candidate::all();
      //return view('backend.candidate.show',compact('Candidates'));
      return $Candidates;
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
            $Candidate = new Candidate();                          
            $Candidate->first_name = $request->first_name;
            $Candidate->last_name = $request->last_name;
            $Candidate->email = $request->email;
            $Candidate->phone = $request->phone;
            $Candidate->country = $request->country;
            $Candidate->city = $request->city;
            $Candidate->linkedin = $request->linkedin;
            $Candidate->github = $request->github;
            $Candidate->behance = $request->behance;
            $Candidate->is_hired = $request->is_hired;
            $Candidate->save();
            //return redirect()->route('candidate.index');
            return redirect()->route('candidate.index')
            ->with('success_message', 'Candidate has been created successfully!');
        }
    
        catch (\Exception $e){
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
    public function update(Request $request)
    {
        try {

            $validated = $request->validated();
            $Candidate = Candidate::findOrFail($request->id);
            $Candidate->update([                  
            $Candidate->first_name = $request->first_name,
            $Candidate->last_name = $request->last_name,
            $Candidate->email = $request->email,
            $Candidate->phone = $request->phone,
            $Candidate->country = $request->country,
            $Candidate->city = $request->city,
            $Candidate->linkedin = $request->linkedin,
            $Candidate->github = $request->github,
            $Candidate->behance = $request->behance,
            $Candidate->is_hired = $request->is_hired,
            ]);
            //return redirect()->route('candidate.index');
            return redirect()->route('candidate.index')
            ->with('success_message', 'Candidate has been updated successfully!');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Candidate = Candidate::findOrFail($request->id)->delete();
        //return redirect()->route('candidate.index');
        return redirect()->route('candidate.index')
        ->with('success_message', 'Candidate has been deleted successfully!');
    }
}
