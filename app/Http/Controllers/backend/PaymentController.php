<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Pagination
        //$Payments = Payment::paginate(5);
        //return view('backend.payment.show', compact('Payments'))
        $Payments = Payment::all();
        $Clients = Client::all();
        $Deals = Deal::all();
        //return view('backend.payment.show',compact('Payments','Clients', 'Deals'));
        return $Payments;
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
    public function store(Request $request)
    {
        try {
            $validated = $request->validated();

            Payment::create($validated);

            return redirect()->route('payment.index')
                ->with('success_message', 'Payment created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // $payment = Payment::findOrFail($request->id)->delete();
        // //return redirect()->route('payment.index');
        // return redirect()->route('payment.index')
        //     ->with('success_message', 'Payment has been deleted successfully!');
    }
}
