<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDealRequest;
use App\Http\Requests\UpdateDealRequest;
use App\Models\Client;
use App\Models\Deal;
use App\Models\Service;
use App\Models\Service_Request;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Pagination
        //$Deals = Deal::paginate(5);
        $deals = Deal::with(['client', 'services', 'serviceRequest' => function ($query) {
            $query->withTrashed();
        }])->get();

        $clients = Client::all();
        $services = Service::all();
        // $service_requests = Service_Request::all();
        // $service_requests = Service_Request::onlyTrashed()->get();
        $service_requests = Service_Request::doesntHave('deal')->get();
        return view('admin.deals', compact('deals', 'service_requests', 'clients', 'services'));
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
    public function store(StoreDealRequest $request)
    {
        try {
            $validated = $request->validated();
            $exists = Deal::where('service_request_id', $validated['service_request_id'])->exists();
            if ($exists) {
                return redirect()->back()->withErrors(['error' => 'This Service Request already has a Deal.']);
            }
            $dealData = collect($validated)->except('services')->toArray();
            $serviceRequest = Service_Request::findOrFail($validated['service_request_id']);
            $dealData['client_id'] = $serviceRequest->client_id;
            // $dealData['name'] = $serviceRequest->name;
            $deal = Deal::create($dealData);
            if ($request->has('services')) {
                $deal->services()->attach($request->services);
            }
            $serviceRequest->delete();
            return redirect()->route('deal.index')
                ->with('success_message', 'Deal has been created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function getServiceRequestData($id)
    {
        $request = Service_Request::with(['client', 'services'])->findOrFail($id);

        return response()->json([
            'client' => [
                'id' => $request->client->id,
                'name' => $request->client->name,
            ],
            'services' => $request->services->map(function ($service) {
                return [
                    'id' => $service->id,
                    'name' => $service->name,
                ];
            }),
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(Deal $deal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deal $deal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDealRequest $request)
    {
        try {
            $deal = Deal::findOrFail($request->id);
            $deal->status = $request->status;
            $deal->details = $request->details;
            $deal->name = $request->name;
            $deal->save();
            $deal->services()->sync($request->services);

            return redirect()->back()->with('success', 'Deal updated successfully.');
        } catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $deal = Deal::findOrFail($request->id)->delete();
        //return redirect()->route('deal.index');
        return redirect()->route('deal.index')
            ->with('success_message', 'Deal has been deleted successfully!');
    }

    public function createFromRequest($id)
    {
        try {
            $serviceRequest = Service_Request::with('client', 'services')->findOrFail($id);

            $exists = Deal::where('service_request_id', $id)->exists();
            if ($exists) {
                return redirect()->route('deal.index')
                    ->withErrors(['error' => 'This Service Request already has a Deal.']);
            }

            $deal = Deal::create([
                'service_request_id' => $serviceRequest->id,
                'client_id'           => $serviceRequest->client_id,
                'status'              => 'pending',
                'details'             => $serviceRequest->details,
                // 'service_request_name'=> $serviceRequest->name,
                'name' => $serviceRequest->name,

            ]);

            if ($serviceRequest->services) {
                $deal->services()->attach($serviceRequest->services->pluck('id')->toArray());
            }

            $serviceRequest->delete();

            return redirect()->route('service-request.index')
                ->with('success_message', 'Deal created successfully!');
        } catch (\Exception $e) {
            return redirect()->route('service-request.index')
                ->withErrors(['error' => $e->getMessage()]);
        }
    }


}
