<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $client = Auth::guard('client')->user();

        $invoices = $client->invoices()->latest()->get();

        $clients = Client::all();

        $deals = Deal::all();

        return view('clients-dashboard.invoices', compact('invoices', 'deals', 'clients'));
    }
}
