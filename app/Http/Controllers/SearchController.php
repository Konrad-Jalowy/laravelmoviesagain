<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;
use App\Models\Actor;
use App\Models\Movie;
use App\Models\Article;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required',
            'search' => 'required',
        ]);
        switch ($validated['category']) {
            case 'directors':
                $directors = Director::query();
                $directors->when(request('search'), function ($query) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                });
                return view('search.searchdirector', ['directors' => $directors->withCount('movies')->get()]);
                break;
            case 'actors':
                $actors = Actor::query();
                $actors->when(request('search'), function ($query) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                });
                return view('search.searchactor', ['actors' => $actors->withCount('movies')->get()]);
                break;
            case 'movies':
                    $movies = Movie::query();
                    $movies->when(request('search'), function ($query) {
                        $query->where('title', 'like', '%' . request('search') . '%');
                    });
                    return view('search.searchmovie', ['movies' => $movies->get()]);
                    break;
            case 'articles':
                        $articles = Article::query();
                        $articles->when(request('search'), function ($query) {
                            $query->where('title', 'like', '%' . request('search') . '%');
                        });
                        return view('search.searcharticle', ['articles' => $articles->get()]);
                        break;
            default:
            $directors = Director::query();
                $directors->when(request('search'), function ($query) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                });
            $actors = Actor::query();
                $actors->when(request('search'), function ($query) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                });
            $movies = Movie::query();
                $movies->when(request('search'), function ($query) {
                    $query->where('title', 'like', '%' . request('search') . '%');
                });
            $articles = Article::query();
                $articles->when(request('search'), function ($query) {
                    $query->where('title', 'like', '%' . request('search') . '%');
                });
            return view('search.searchall', ['directors' => $directors->withCount('movies')->get(),
            'actors' => $actors->withCount('movies')->get(),
            'movies' => $movies->get(),
            'articles' => $articles->get()
        ]);
        break;

        }
        
        return $validated['category'];
    }
}
