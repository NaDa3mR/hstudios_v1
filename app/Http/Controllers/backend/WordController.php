<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Pagination
        //$words = Word::paginate(5);
         $words= Word::all();
        //return view('backend.word.show', compact('words'))
        return $words;
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
    public function store(WordRequest $request)
    {
        try {
            $validated = $request->validated();

            Word::create($validated);

            return redirect()->route('word.index')
                ->with('success_message', 'Word created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Word $word)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Word $word)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WordRequest $request)
    {
        $word = Word::findOrFail($request->id);
        $word->update($request->validated());

        return redirect()->route('word.index')
            ->with('success_message', 'Word updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         $word = Word::findOrFail($request->id)->delete();
         //return redirect()->route('word.index');
         return redirect()->route('word.index')
             ->with('success_message', 'Word has been deleted successfully!');
    }
}
