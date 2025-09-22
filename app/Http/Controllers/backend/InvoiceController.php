<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Models\Client;
use App\Models\Deal;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with(['client', 'deal'])->get();
        $clients = Client::all();
        $deals = Deal::all();
        return view('admin.invoices', compact('invoices', 'deals', 'clients'));
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
    public function store(StoreInvoiceRequest $request)
    {
        try {
            $validated = $request->validated();
            $lastInvoiceId = Invoice::max('id') + 1;
            $validated['invoice_number'] = 'INV-' . str_pad($lastInvoiceId, 5, '0', STR_PAD_LEFT);
            Invoice::create($validated);
            return redirect()->route('invoice.index')
                ->with('success_message', 'Invoice has been created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        try {

            $validated = $request->validated();
            unset($validated['invoice_number']);
            $invoice->update($validated);
            return redirect()->route('invoice.index')
                ->with('success_message', 'Invoice has been updated successfully!');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function getClientDeals($id)
    {
        $deals = Deal::where('client_id', $id)->get(['id', 'name']);
        return response()->json($deals);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Invoice::findOrFail($request->id)->delete();
        return redirect()->route('invoice.index')
            ->with('success_message', 'Invoice has been deleted successfully!');
    }
}
