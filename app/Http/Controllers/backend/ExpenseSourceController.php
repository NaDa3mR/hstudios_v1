<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseSourceRequest;
use App\Http\Requests\UpdateExpenseSourceRequest;
use App\Models\Expense_Source;
use Illuminate\Http\Request;

class ExpenseSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //Pagination
      //$E_sources = E_source::paginate(5);
      //return view('backend.E_source.show', compact('E_sources'))
      $E_sources = Expense_Source::all();
      //return view('backend.E_source.show',compact('E_sources'));
      return $E_sources;
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
    public function store(StoreExpenseSourceRequest $request)
    {
        try {
            $validated = $request->validated();
            Expense_Source::create($validated);
            //return redirect()->route('E_source.index');
            return redirect()->route('E_source.index')
            ->with('success_message', 'Expense Source has been created successfully!');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense_Source $expense_Source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense_Source $expense_Source)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseSourceRequest $request)
    {
        try {

            $validated = $request->validated();
            $E_source = Expense_Source::findOrFail($request->id);
            $E_source->update($validated);
            //return redirect()->route('E_source.index');
            return redirect()->route('E_source.index')
            ->with('success_message', 'Expense Source has been updated successfully!');
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
        $E_source = Expense_Source::findOrFail($request->id)->delete();
        //return redirect()->route('e_source.index');
        return redirect()->route('e_source.index')
        ->with('success_message', 'Expense Source has been deleted successfully!');
    }
}
