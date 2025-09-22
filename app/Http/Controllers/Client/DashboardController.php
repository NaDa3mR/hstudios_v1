<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
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
        $totalUnpaid = Invoice::where('client_id', $client->id)
            ->where('status', 'unpaid')
            ->sum('amount');
        $countPending = Invoice::where('client_id', $client->id)
            ->where('status', 'pending')->count();
        return view('clients-dashboard.dashboard', compact('deals', 'client', 'requests', 'invoices', 'totalUnpaid', 'countPending'));
    }

    //     public function profile()
// {
//     $client = Auth::guard('client')->user();
//     return view('clients-dashboard.dashboard', compact('client'));
// }

}
