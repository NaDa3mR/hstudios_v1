<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$Clients = Client::all();
        $clients = Client::all();
        return view('admin.clients', compact('clients'));
        //return $Clients;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        try {
            $validated = $request->validated();
            $client = Client::create($validated);
            if ($request->hasFile('image')) {
                $client->addMediaFromRequest('image')->toMediaCollection('client_images');
            }
            return redirect()->route('client.index')
                ->with('success_message', 'Client has been created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function serviceRequests(Client $client)
    {
        $serviceRequests = $client->serviceRequests;
        return view('admin.service-requests', compact('client', 'serviceRequests'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request)
    {
        try {

            $validated = $request->validated();
            $client = Client::findOrFail($request->id);
            $client->update($validated);

            if ($request->hasFile('image')) {
                $client->clearMediaCollection('client_images'); 
                $client->addMediaFromRequest('image')->toMediaCollection('client_images');
            }
            return redirect()->route('client.index')
                ->with('success_message', 'Client has been updated successfully!');
            ;
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
        $Client = Client::findOrFail($request->id)->delete();
        return redirect()->route('client.index')
            ->with('success_message', 'CLient has been deleted successfully!');
        ;
    }


}
