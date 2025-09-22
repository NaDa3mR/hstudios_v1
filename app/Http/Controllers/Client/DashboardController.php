<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $client = auth('client')->user();
        $deals = $client->deals;
        $requests = $client->serviceRequests;
        return view('clients-dashboard.dashboard' , compact('deals', 'client', 'requests'));
    }

//     public function profile()
// {
//     $client = Auth::guard('client')->user();
//     return view('clients-dashboard.dashboard', compact('client'));
// }

}
