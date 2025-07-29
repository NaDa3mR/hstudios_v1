<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //Pagination
      //$Incomes = Income::paginate(5);
      //return view('backend.income.show', compact('Incomes'))
      $Incomes = Income::all();
      //return view('backend.income.show',compact('Incomes'));
      return $Incomes;
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
    public function store(StoreIncomeRequest $request)
    {
        try {
            $validated = $request->validated();
            $Income = new Income();                          
            $Income->account_id = $request->account_id;
            $Income->income_source_id = $request->income_source_id;
            $Income->title = $request->title;
            $Income->amount = $request->amount;
            $Income->income_date = $request->income_date;
            $Income->details = $request->details;
            $Income->save();
            //return redirect()->route('income.index');
            return redirect()->route('income.index')
            ->with('success_message', 'Income Cash has been created successfully!');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeRequest $request)
    {
        try {

            $validated = $request->validated();
            $Income = Income::findOrFail($request->id);
            $Income->update([                  
            $Income->account_id = $request->account_id,
            $Income->income_source_id = $request->income_source_id,
            $Income->title = $request->title,
            $Income->amount = $request->amount,
            $Income->income_date = $request->income_date,
            $Income->details = $request->details,
            ]);
            //return redirect()->route('income.index');
            return redirect()->route('income.index')
            ->with('success_message', 'Income Cash has been updated successfully!');
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
        $Income = Income::findOrFail($request->id)->delete();
        //return redirect()->route('income.index');
        return redirect()->route('income.index')
        ->with('success_message', 'Income Cash has been deleted successfully!');
    }
}
