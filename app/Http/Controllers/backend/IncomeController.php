<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\Account;
use App\Models\Income;
use App\Models\Income_Source;
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
      $incomes = Income::with('account', 'in_source')->get();
      $accounts = Account::where('is_active', 1)->get();
      $income_sources = Income_Source::all();

      return view('admin.incomes', compact('incomes', 'accounts', 'income_sources'));
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
            Income::create($validated);
            //return redirect()->route('income.index');
            return redirect()->route('income.index')
            ->with('success_message', 'Income cash has been created successfully!');
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
            $income = Income::findOrFail($request->id);
            $income->update($validated);
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
        $income = Income::findOrFail($request->id)->delete();
        //return redirect()->route('income.index');
        return redirect()->route('income.index')
        ->with('success_message', 'Income Cash has been deleted successfully!');
    }
}
