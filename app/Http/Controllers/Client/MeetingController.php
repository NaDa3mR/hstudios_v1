<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    public function index()
    {
        $client = Auth::guard('client')->user();

        $meetings = $client->meetings()->latest()->get();

        $services = Service::all();

        return view('clients-dashboard.meetings', compact('meetings', 'services'));
    }

    public function calendar()
    {
        // Get the logged-in client
        $client = Auth::guard('client')->user();

        // Fetch only this client's meetings
        $meetings = Meeting::with(['client', 'deal'])
            ->where('client_id', $client->id)
            ->get();

        return view('clients-dashboard.meetings.calendar', compact('meetings'));
    }


}
