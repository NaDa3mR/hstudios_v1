<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::latest()->take(6)->get();
        // $footservices = Service::latest()->take(3)->get();
        $projects = Project::latest()->take(6)->get();
        $clients = Client::all();

        return view('frontend.home', compact('services', 'projects', 'clients'));
    }

    // public function footer()
    // {
    //     $footservices = Service::latest()->take(3)->get();
    //     return view('frontend.main.footer', compact( 'footservices'));

    // }
}
