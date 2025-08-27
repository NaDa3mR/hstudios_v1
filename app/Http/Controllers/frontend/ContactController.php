<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Pagination
      //$Contacts = Contact::paginate(5);
      //return view('backend.contact.show', compact('Contacts'))
      $contacts = Contact::all();
      return view('admin.contacts',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        try {
            $validated = $request->validated();
            Contact::create($validated);
            //return redirect()->view('frontend.contact.ShowForm');
            return redirect()->view('frontend.contact')
            ->with('success_message', 'Contact has been created successfully!');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {

            $validated = $request->validated();
            $contact = Contact::findOrFail($request->id);
            $contact->update($validated);
            //return redirect()->route('contact.index');
            return redirect()->route('contact.index')
            ->with('success_message', 'Contact has been updated successfully!');
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
         Contact::findOrFail($request->id)->delete();
        //return redirect()->route('contact.index');
        return redirect()->route('contact.index')
        ->with('success_message', 'Contact Info has been deleted successfully!');
    }
}
