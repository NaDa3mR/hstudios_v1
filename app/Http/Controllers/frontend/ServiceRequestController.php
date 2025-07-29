<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
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
      //$Service_Requests = Service_Request::paginate(5);
      //return view('backend.serviceRequest.show', compact('Service_Requests'))
      $Service_Requests = Service_Request::all();
      //return view('backend.serviceRequest.show',compact('Service_Requests'));
      return $Service_Requests;
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
    public function store(Request $request)
    {
        try {
            $validated = $request->validated();
            Service_Request::create($validated);
            //return redirect()->route('serviceRequest.index');
            return redirect()->view('backend.serviceRequest.showForm')
            ->with('success_message', 'Request has been created successfully!');
        }
    
        catch (\Exception $e){
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
    public function update(Request $request)
    {
        try {

            $validated = $request->validated();
            $Service_Request = Service_Request::findOrFail($request->id);
            $Service_Request->update($validated);
            //return redirect()->route('serviceRequest.index');
            return redirect()->route('serviceRequest.index')
            ->with('success_message', 'Request has been updated successfully!');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $Blog = Service_Request::findOrFail($request->id)->delete();
        //return redirect()->route('serviceRequest.index');
        return redirect()->route('serviceRequest.index')
        ->with('success_message', 'Request has been deleted successfully!');
    }
    public function ApproveRequest(Request $request)
    {

        $serviceRequest = Service_Request::findOrFail($request->id);

        if ($serviceRequest->status !== 'approved') {
            // Update the status
            $serviceRequest->update(['status' => 'approved']);

            // Create a deal if not exists
            if (!$serviceRequest->deal) {
                $deal = Deal::create([
                    'service_request_id' => $serviceRequest->id,
                    'status' =>  $serviceRequest->title,
                    'details' =>  $serviceRequest->details,

                ]);
            }

            return response()->json(['message' => 'Request approved and deal created successfully.']);
        }

        return response()->json(['message' => 'Request already approved.']);

    }


}
