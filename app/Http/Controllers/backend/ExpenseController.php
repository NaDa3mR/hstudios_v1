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
            $Expense = new Expense();                          
            $Expense->account_id = $request->account_id;
            $Expense->expense_source_id = $request->expense_source_id;
            $Expense->title = $request->title;
            $Expense->amount = $request->amount;
            $Expense->expense_date = $request->expense_date;
            $Expense->details = $request->details;
            $Expense->save();
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
            $Expense->update([                  
            $Expense->account_id = $request->account_id,
            $Expense->expense_source_id = $request->expense_source_id,
            $Expense->title = $request->title,
            $Expense->amount = $request->amount,
            $Expense->expense_date = $request->expense_date,
            $Expense->details = $request->details,
            ]);
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
