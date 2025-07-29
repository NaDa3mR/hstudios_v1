<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeSourceRequest;
use App\Http\Requests\UpdateIncomeSourceRequest;
use App\Models\Income_Source;
use Illuminate\Http\Request;

class IncomeSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //Pagination
      //$In_sources = In_source::paginate(5);
      //return view('backend.In_source.show', compact('In_sources'))
      $In_sources = Income_Source::all();
      //return view('backend.In_source.show',compact('In_sources'));
      return $In_sources;
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
    public function store(StoreIncomeSourceRequest $request)
    {
        try {
            $validated = $request->validated();
            $In_source = new Income_Source();                          
            $In_source->name = $request->name;
            $In_source->details = $request->details;
            $In_source->is_active = $request->is_active;
            $In_source->save();
            //return redirect()->route('In_source.index');
            return redirect()->route('In_source.index')
            ->with('success_message', 'Income Source has been created successfully!');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Income_Source $income_Source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income_Source $income_Source)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeSourceRequest $request)
    {
        try {

            $validated = $request->validated();
            $In_source = Income_Source::findOrFail($request->id);
            $In_source->update([                  
            $In_source->name = $request->name,
            $In_source->details = $request->details,
            $In_source->is_active = $request->is_active,
            ]);
            //return redirect()->route('In_source.index');
            return redirect()->route('In_source.index')
            ->with('success_message', 'Income Source has been updated successfully!');
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
        $In_source = Income_Source::findOrFail($request->id)->delete();
        //return redirect()->route('In_source.index');
        return redirect()->route('In_source.index')
        ->with('success_message', 'Income Source has been deleted successfully!');
    }
}
