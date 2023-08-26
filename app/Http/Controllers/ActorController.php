<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use App\Models\Movie;


class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $actors = Actor::withCount('movies')->get();
        return view('actor.showall', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actor.createform');
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
            'name' => 'required|unique:actors|max:255',
            'bio' => 'required',
            'date_of_birth' => 'required'
        ]);
        $newActor = new Actor();
        $newActor->name = $validated['name'];
        $newActor->bio = $validated['bio'];
        $newActor->date_of_birth = $validated['date_of_birth'];
        $newActor->save();
        return redirect()->route('actors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        $actor->load('movies');
        return view('actor.showone', compact('actor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Actor $actor)
    {
        return view('actor.editform', ['actor' => $actor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'bio' => 'required',
            'date_of_birth' => 'required'
        ]);
        $actor->name = $validated['name'];
        $actor->bio = $validated['bio'];
        $actor->date_of_birth = $validated['date_of_birth'];
        $actor->save();
        return redirect()->route('actors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();
        return redirect()->route('actors.index');
    }

    public function selectAndJoin(){
        $movies = Movie::all();
        $actors = Actor::all();
        return view('actor.joinform', ['movies' => $movies, 'actors' => $actors]);
    }

    public function join(Request $request) {
        $validated = $request->validate([
            'actor' => 'required',
            'movie' => 'required',
        ]);
        $actor = Actor::find($validated['actor']);
        $actor->movies()->syncWithoutDetaching([$validated['movie']]);
        return redirect()->route('actors.index');
    }
}
