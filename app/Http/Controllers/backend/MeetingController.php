<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Pagination
        $data['Meetings'] = Meeting::all();
        //$Meetings = Meeting::paginate(5);
         $data['$Clients'] = Client::all();
        //return view('backend.meeting.show', compact('data'))
        return $data;
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

            $client = Client::findOrFail($validated['client_id']);
            $client->meetings()->create($validated);

            return redirect()->route('clients.index')
                ->with('success_message', 'Meeting created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meeting $meeting)
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
    
            $meeting = Meeting::findOrFail($request->id);
            $meeting->update($validated);
    
            return redirect()->route('meeting.index')
                ->with('success_message', 'Meeting has been updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Meeting = Meeting::findOrFail($request->id)->delete();
        //return redirect()->route('meeting.index');
        return redirect()->route('meeting.index')
            ->with('success_message', 'Meeting has been deleted successfully!');
    }
}
