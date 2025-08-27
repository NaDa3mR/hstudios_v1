<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Deal;
use App\Models\Income;
use App\Models\Service;
use App\Models\Service_Request;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //Pagination
        //$Deals = Deal::paginate(5);

        $deals = Deal::with(['client', 'services', 'serviceRequest' => function ($query) {
            $query->withTrashed();
        }])->get();

        $clients = Client::all();
        $services = Service::all();
        $service_requests = Service_Request::doesntHave('deal')->get();
        $requests = Service_Request::all();
        $contacts = Contact::all();
        $totalIncome = Income::sum('amount');
        $InsourcesCount = Income::count();
        $totalExpense = Income::sum('amount');
        $ExsourcesCount = Income::count();
        return view('admin.dashboard', compact('deals', 'service_requests', 'clients', 'services', 'requests', 'contacts','totalIncome', 'totalExpense', 'InsourcesCount', 'ExsourcesCount'));
    }
}
