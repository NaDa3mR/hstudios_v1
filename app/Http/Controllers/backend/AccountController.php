<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $Accounts = Account::all();
      //return view('backend..show'account,compact('$Accounts'));
      return $Accounts ;
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
    public function store(StoreAccountRequest $request)
    {
        try {
            $validated = $request->validated();
            Account::create($validated);
            //return redirect()->route('account.index');
            return redirect()->route('account.index')
            ->with('success_message', 'Client data has been created successfully!');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request)
    {
        try{
            $validated = $request->validated();
            $Account = Account::findOrFail($request->id);
            $Account->update($validated);
            //return redirect()->route('account.index');
            return redirect()->route('account.index')
            ->with('success_message', 'Client data has been updated successfully!');

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
        $Account = Account::findOrFail($request->id)->delete();
        //return redirect()->route('account.index');
        return redirect()->route('account.index')
        ->with('success_message', 'Client has been deleted successfully!');

    }
}
