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

        $deals = Deal::with([
            'client',
            'services',
            'serviceRequest' => function ($query) {
                $query->withTrashed();
            }
        ])->get();

        $clients = Client::all();
        $services = Service::all();
        $service_requests = Service_Request::doesntHave('deal')->get();
        $requests = Service_Request::all();
        $contacts = Contact::all();
        $totalIncome = Income::sum('amount');
        $InsourcesCount = Income::count();
        $totalExpense = Income::sum('amount');
        $totaldealprice = Deal::sum('price');
        $totalDeals = Deal::count();

        $pendingDeals = Deal::where('status', 'pending')->count();
        $inProgressDeals = Deal::where('status', 'in_progress')->count();
        $completedDeals = Deal::where('status', 'completed')->count();
        $wonDeals = Deal::where('status', 'won')->count();
        $lostDeals = Deal::where('status', 'lost')->count();



        return view('admin.dashboard', compact(
            'deals',
            'service_requests',
            'clients',
            'services',
            'requests',
            'contacts',
            'totalIncome',
            'totalExpense',
            'InsourcesCount',
            'totaldealprice',
            // 'ExsourcesCount',
            'totalDeals',
            'pendingDeals',
            'inProgressDeals',
            'completedDeals',
            'wonDeals',
            'lostDeals'
        ));
    }


    //     public function statistics()
// {
//     $totalDeals   = Deal::count();
//     $pendingDeals = Deal::where('status', Deal::STATUS_PENDING)->count();
//     $inProgressDeals = Deal::where('status', Deal::STATUS_IN_PROGRESS)->count();
//     $completedDeals  = Deal::where('status', Deal::STATUS_COMPLETED)->count();
//     $wonDeals     = Deal::where('status', Deal::STATUS_WON)->count();
//     $lostDeals    = Deal::where('status', Deal::STATUS_LOST)->count();

    //     return view('admin.dashboard', compact(
//         'totalDeals',
//         'pendingDeals',
//         'inProgressDeals',
//         'completedDeals',
//         'wonDeals',
//         'lostDeals'
//     ));
// }


}
