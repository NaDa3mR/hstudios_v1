<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceReqRequest;
use App\Models\Service;
use App\Models\Service_Request;
use Auth;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function show(Request $request)
    {
        $client = Auth::guard('client')->user();

        $requests = Service_Request::with('services')
            ->where('client_id', $client->id)
            ->findOrFail($request->id);

        // $services = Service::all();
        return view('clients-dashboard.deals.section', compact('requests'));
    }

    public function index()
    {
        $client = Auth::guard('client')->user();
        $services = Service::all();
        $requests = Service_Request::with('services')
            ->where('client_id', $client->id)
            ->get();

        return view('clients-dashboard.requests', compact('requests', 'services'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'services' => 'required|array',
                'services.*' => 'exists:services,id',
                'details' => 'required|string',
                'request_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            ]);

            $service_request = Service_Request::create([
                'name' => $validated['name'],
                'client_id' => Auth::guard('client')->id(),
                'details' => $validated['details'],
            ]);

            if ($request->hasFile('request_file')) {
                $service_request->addMediaFromRequest('request_file')
                ->toMediaCollection('service_file');
            }

            // if (!empty($validated['services'])) {
            //     $service_request->services()->attach($validated['services']);
            // }
            $service_request->services()->sync($validated['services'] ?? []);

            return redirect()
                ->route('client.request.index')
                ->with('success_message', 'Service request created successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }

}
