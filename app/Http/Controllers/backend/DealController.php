<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDealRequest;
use App\Http\Requests\UpdateDealRequest;
use App\Models\Deal;
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
      //return view('backend.deal.show', compact('Deals'))
      $Deals = Deal::all();
      //return view('backend.deal.show',compact('Deals'));
      return $Deals;
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
            Deal::create($validated);
            //return redirect()->route('Deal.index');
            return redirect()->route('deal.index')
            ->with('success_message', 'Deal has been created successfully!');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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

            $validated = $request->validated();
            $Deal = Deal::findOrFail($request->id);
            $Deal->update($validated);
            //return redirect()->route('deal.index');
            return redirect()->route('deal.index')
            ->with('success_message', 'Deal has been updated successfully!');
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
        $Deal = Deal::findOrFail($request->id)->delete();
        //return redirect()->route('deal.index');
        return redirect()->route('deal.index')
        ->with('success_message', 'Deal has been deleted successfully!');
    }
}
