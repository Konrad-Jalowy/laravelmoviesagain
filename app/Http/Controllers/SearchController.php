<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Director;

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
        }
        
        return $validated['search'];
    }
}
