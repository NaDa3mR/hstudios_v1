<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
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
      $Contacts = Contact::all();
      //return view('backend.contact.show',compact('Contacts'));
      return $Contacts;
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
            Contact::create($validated);
            //return redirect()->view('frontend.contact.ShowForm');
            // return redirect()->view('frontend.contact.ShowForm')
            // ->with('success_message', 'Contact has been created successfully!');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
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
            $Contact = Contact::findOrFail($request->id);
            $Contact->update($validated);
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
        $Contact = Contact::findOrFail($request->id)->delete();
        //return redirect()->route('contact.index');
        return redirect()->route('contact.index')
        ->with('success_message', 'Contact has been deleted successfully!');
    }
}
