<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransferRequest;
use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transfers = Transfer::paginate(5);
        return view('backend.transfer.show', compact('tranfers'));
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
    public function store(StoreTransferRequest $request)
    {
        $validated = $request->validated();
        $from = Account::find($validated['account_id_from']);
        $to = Account::find($validated['account_id_to']);
        if($from->balance < $validated['amount']){
            return back()->withErrors(['amount' => 'your balance is not enough to complete the process.']);
        }

        DB::transaction(function () use ($from, $to, $validated){
            $from->balance -= $validated['amount'];
            $from->save();
            $to->balance += $validated['amount'];
            $to->save();

            Transfer::create($validated);
        });

        return redirect()->route('transfers.index')->with('success_message', 'Transfer completed!');

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
