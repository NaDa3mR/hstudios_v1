<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
{

    public function index()
    {
        $client = Auth::guard('client')->user();

        $deals = Deal::with('services')
            ->where('client_id', $client->id)
            ->get();

        return view('clients-dashboard.deals', compact('deals'));
    }


    public function show(Request $request)
    {
        $client = Auth::guard('client')->user();

        $deal = Deal::with('services')
            ->where('client_id', $client->id)
            ->findOrFail($request->id);
        return view('clients-dashboard.deals.section', compact('deal'));
    }


}
