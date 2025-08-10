<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceReqRequest;
use App\Http\Requests\UpdateServiceReqRequest;
use App\Models\Client;
use App\Models\Deal;
use App\Models\Service;
use App\Models\Service_Request;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Pagination
        $service_requests = Service_Request::all();
        $clients = Client::all();
        $services = Service::all();
        return view('admin.service-requests', compact('service_requests', 'clients', 'services'));
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
    public function store(StoreServiceReqRequest $request)
    {
        try {
            $validated = $request->validated();
            $service_request = Service_Request::create([
                'name' => $validated['name'],
                'client_id' => $validated['client_id'],
                'details' => $validated['details'],
            ]);
            $service_request->services()->attach($validated['services']);
            return redirect()->route('service-request.index')->with('success_message', 'Service request created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service_Request $service_Request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service_Request $service_Request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceReqRequest $request)
    {
        try {
            $validated = $request->validated();
            $service_request = Service_Request::findOrFail($request->id);
            $service_request->update($validated);

            if ($request->has('services')) {
                $service_request->services()->sync($request->input('services'));
            }
            return redirect()->route('service-request.index')
                ->with('success_message', 'Request has been updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $service_request = Service_Request::findOrFail($request->id)->forceDelete();;
        //return redirect()->route('serviceRequest.index');
        return redirect()->route('service-request.index')
            ->with('success_message', 'Request has been deleted successfully!');
    }
    // public function ApproveRequest(Request $request)
    // {

    //     $service_request = Service_Request::findOrFail($request->id);

    //     if ($service_request->status !== 'approved') {
    //         // Update the status
    //         $service_request->update(['status' => 'approved']);

    //         // Create a deal if not exists
    //         if (!$request->deal) {
    //             $deal = Deal::create([
    //                 'service_request_id' => $request->id,
    //                 'status' => 'pending',
    //                 'details' => $request->details,

    //             ]);
    //         }

    //         return response()->json(['message' => 'Request approved and deal created successfully.']);
    //     }

    //     return response()->json(['message' => 'Request already approved.']);

    // }


}
