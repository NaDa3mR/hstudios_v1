<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $client = auth('client')->user();
        $deals = $client->deals;
        $requests = $client->serviceRequests;
        $invoices = $client->invoices;
        $meetings = Meeting::with('deal')
            ->where('client_id', $client->id)
            ->get();
        $totalUnpaid = Invoice::where('client_id', $client->id)
            ->where('status', 'unpaid')
            ->sum('amount');
        $totalPending = Invoice::where('client_id', $client->id)
            ->where('status', 'pending')
            ->sum('amount');
        $countPending = Invoice::where('client_id', $client->id)
            ->where('status', 'pending')->count();
        $countUnpaid = Invoice::where('client_id', $client->id)
            ->where('status', 'unpaid')->count();
        return view('clients-dashboard.dashboard', compact('deals', 'client', 'requests', 'invoices', 'totalUnpaid', 'countPending', 'meetings', 'totalPending', 'countUnpaid'));
    }

    //     public function profile()
// {
//     $client = Auth::guard('client')->user();
//     return view('clients-dashboard.dashboard', compact('client'));
// }

}
