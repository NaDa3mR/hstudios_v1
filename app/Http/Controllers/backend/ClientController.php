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
      $Clients = Client::all();
      return view('backend.client.show',compact('Clients'));
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
            $Client = new Client();
            $Client->name = $request->name;
            $Client->email = $request->email;
            $Client->password = Hash::make($request->password);
            $Client->company_name = $request->company_name;
            $Client->company_field = $request->company_field;
            $Client->save();
            return redirect()->route('client.index');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
            $Client = Client::findOrFail($request->id);
            $Client->update([
                $Client->name = $request->name,
                $Client->email = $request->email,
                $Client->password = Hash::make($request->password),
                $Client->company_name = $request->company_name,
                $Client->company_field = $request->company_field,
            ]);
            return redirect()->route('client.index');
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
        $Client = Client::findOrFail($request->id)->delete();
        return redirect()->route('client.index');
    }
}
