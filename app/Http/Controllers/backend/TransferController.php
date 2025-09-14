<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransferRequest;
use App\Models\Account;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $transfers = Transfer::paginate( 5);
        $transfers = Transfer::all();
        $accounts = Account::where('is_active', 1)->get();
        return view('admin.transfers', compact('transfers', 'accounts'));
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
    // public function store(StoreTransferRequest $request)
    // {
    //     $validated = $request->validated();
    //     $from = Account::find($validated['account_id_from']);
    //     $to = Account::find($validated['account_id_to']);
    //     if($from->balance < $validated['amount']){
    //         return back()->withErrors(['amount' => 'your balance is not enough to complete the process.']);
    //     }

    //     DB::transaction(function () use ($from, $to, $validated){
    //         $from->balance -= $validated['amount'];
    //         $from->save();
    //         $to->balance += $validated['amount'];
    //         $to->save();

    //         Transfer::create($validated);
    //     });

    //     return redirect()->route('transfers.index')->with('success_message', 'Transfer completed!');

    // }

    public function store(StoreTransferRequest $request)
    {
        $validated = $request->validated();
        $fromAccount = Account::findOrFail($request->account_id_from);
        $toAccount = Account::findOrFail($request->account_id_to);

        if ($fromAccount->balance < $request->amount) {
            return redirect()->route('transfer.index')->withErrors(['amount' => 'Insufficient balance in From Account']);
        }
        $transfer = Transfer::create($validated);

        $fromAccount->balance -= $request->amount;
        $fromAccount->save();

        $toAccount->balance += $request->amount;
        $toAccount->save();
        return redirect()->route('transfer.index')->with('success_message', 'Transfer created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $transfer = Transfer::findOrFail($request->id)->delete();
        return redirect()->route('transfer.index');
    }
}
