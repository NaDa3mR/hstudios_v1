<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\StoreExpenseSourceRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Account;
use App\Models\Expense;
use App\Models\Expense_Source;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Pagination
        // $expenses = Expense::with(['account', 'e_source'])->paginate(10);
        $expenses = Expense::with('account', 'e_source')->get();
        $accounts = Account::where('is_active', true)->get();
        $expense_sources = Expense_Source::all();

        return view('admin.expenses', compact('expenses', 'accounts', 'expense_sources'));

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
        } catch (\Exception $e) {
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
            $expense = Expense::findOrFail($request->id);
            $expense->update($validated);
            //return redirect()->route('expense.index');
            return redirect()->route('expense.index')
                ->with('success_message', 'Expense Cash has been updated successfully!');
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
        $expense = Expense::findOrFail($request->id)->delete();
        //return redirect()->route('Expense.index');
        return redirect()->route('expense.index')
            ->with('success_message', 'Expense Cash has been deleted successfully!');
    }
}
