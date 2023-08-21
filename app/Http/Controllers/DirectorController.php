<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Director::withCount('movies')->get();
        return view('director.showall', compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('director.createform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:directors|max:255',
            'bio' => 'required',
            'date_of_birth' => 'required'
        ]);
        $newDirector = new Director();
        $newDirector->name = $validated['name'];
        $newDirector->bio = $validated['bio'];
        $newDirector->date_of_birth = $validated['date_of_birth'];
        $newDirector->save();
        return redirect()->route('directors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function show(Director $director)
    {
        return "not implemented";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function edit(Director $director)
    {
        return view('director.editform', ['director' => $director]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Director $director)
    {
        $validated = $request->validate([
            'name' => 'required|unique:directors|max:255',
            'bio' => 'required',
            'date_of_birth' => 'required'
        ]);
        $director->name = $validated['name'];
        $director->bio = $validated['bio'];
        $director->date_of_birth = $validated['date_of_birth'];
        $director->save();
        return redirect()->route('directors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        $director->delete();
        return redirect()->route('directors.index');
    }
}
