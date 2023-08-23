<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use App\Models\Director;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter', null);
        if(is_null($filter)) {
            $movies = Movie::all();
        }
        else {
            switch ($filter) {
                case 'best':
                    $movies = Movie::orderBy('grade', 'desc')->get();
                    break;
                case 'worst':
                    $movies = Movie::orderBy('grade', 'asc')->get();
                    break;
                case 'longest':
                    $movies = Movie::orderBy('movie_length', 'desc')->get();
                    break;
                case 'shortest':
                    $movies = Movie::orderBy('movie_length', 'asc')->get();
                    break;
                case 'oldest':
                    $movies = Movie::orderBy('date_of_publishing', 'asc')->get();
                    break;
                case 'newest':
                    $movies = Movie::orderBy('date_of_publishing', 'desc')->get();
                    break;
            }
        }
       
        return view('movie.showall', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directors = Director::all();
        $categories = Category::all();
        return view('movie.createform', compact('directors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $director = Director::findOrFail($request['director']);
        $category = Category::findOrFail($request['category']);
        $movie = new Movie();
        $movie->title= $request['title'];
        $movie->director_id = $request['director'];
        $movie->review = $request['review'];
        $movie->date_of_publishing = $request['date_of_publishing'];
        $movie->movie_length = $request['movie_length'];
        $movie->grade = $request['grade'];
        $movie->save();
        $movie->director()->associate($director);
        $movie->save();
        $movie->categories()->syncWithoutDetaching([$category->id]);
        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        $movie->load(['categories', 'director']);
        return view('movie.showone', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $directors = Director::all();
        $categories = Category::all();
        $movie->load(['categories', 'director']);
        $first_cat = $movie->categories()->first();
        return view('movie.editform', compact('movie', 'categories', 'directors', 'first_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $director = Director::findOrFail($request['director']);
        $category = Category::findOrFail($request['category']);
        $movie->title= $request['title'];
        $movie->director_id = $request['director'];
        $movie->review = $request['review'];
        $movie->date_of_publishing = $request['date_of_publishing'];
        $movie->movie_length = $request['movie_length'];
        $movie->grade = $request['grade'];
        $movie->save();
        $movie->director()->associate($director);
        $movie->save();
        if($request->has('delcats')){
            $movie->categories()->sync([]);
        }
        $movie->categories()->syncWithoutDetaching([$category->id]);
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
