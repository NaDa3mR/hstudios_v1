<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\StoreExpenseSourceRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //Pagination
      //$Expenses = Expense::paginate(5);
      //return view('backend.expense.show', compact('Expenses'))
      $Expenses = Expense::all();
      //return view('backend.expense.show',compact('Expenses'));
      return $Expenses;
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
    public function store(StoreExpenseRequest $request)
    {
        try {
            $validated = $request->validated();
            Expense::create($validated);
            //return redirect()->route('Expense.index');
            return redirect()->route('expense.index')
            ->with('success_message', 'Expense Cash has been created successfully!');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request)
    {
        try {

            $validated = $request->validated();
            $Expense = Expense::findOrFail($request->id);
            $Expense->update($validated);
            //return redirect()->route('Expense.index');
            return redirect()->route('Expense.index')
            ->with('success_message', 'Expense Cash has been updated successfully!');
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
        $Expense = Expense::findOrFail($request->id)->delete();
        //return redirect()->route('Expense.index');
        return redirect()->route('expense.index')
        ->with('success_message', 'Expense Cash has been deleted successfully!');
    }
}
