<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use App\Models\Account;
use App\Models\Client;
use App\Models\Deal;
use App\Models\Expense;
use App\Models\Expense_Source;
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
        // $data['Meetings'] = Meeting::all();
        //$Meetings = Meeting::paginate(5);
        //  $data['$Clients'] = Client::all();
        //return view('backend.meeting.show', compact('data'))
        // return $data;
        $meetings = Meeting::with('client', 'deal')->get();
        $clients = Client::all();
        $deals = Deal::all();
        return view('admin.meetings', compact('meetings', 'clients', 'deals'));

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
    public function store(StoreMeetingRequest $request)
    {
        try {
            $validated = $request->validated();
            // $client = Client::findOrFail($validated['client_id']);
            // $client->meetings()->create($validated);

            Meeting::create($validated);
            return redirect()->route('meeting.index')
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
    public function update(UpdateMeetingRequest $request)
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
        Meeting::findOrFail($request->id)->delete();
        //return redirect()->route('meeting.index');
        return redirect()->route('meeting.index')
            ->with('success_message', 'Meeting has been deleted successfully!');
    }

    public function ajaxStore(StoreMeetingRequest $request)
    {
        $data = $request->validated();

        $data['start_time'] = $data['meet_date'] . ' 09:00:00';
        $data['end_time'] = $data['meet_date'] . ' 10:00:00';
        $meeting = Meeting::create($data);

        $meeting->load(['client', 'deal']);

        return response()->json($meeting);
    }

    public function ajaxUpdate(Request $request, Meeting $meeting)
    {
        $data = $request->validate([
            'meet_date' => 'required|date',
        ]);

        $meeting->update([
            'meet_date' => $data['meet_date']
        ]);

        return response()->json(['success' => true]);
    }

    public function calendar()
    {
        $meetings = Meeting::with(['client', 'deal'])->get();
        $clients = Client::all();
        $deals = Deal::all();

        return view('admin.sections.meetings.calendar', compact('meetings', 'clients', 'deals'));
    }

}
