<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.showall', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.createform');
    }

    public function createAnswer(Article $article) {
        return view('article.answerform', ['article' => $article]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $article = new Article();
        $article->user_id = $user->id;
        $article->title = $request['title'];
        $article->lead = $request['lead'];
        $article->content = $request['content'];
        $article->save();
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article->load('user');
        return view('article.showone', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.editform', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->title = $request['title'];
        $article->lead = $request['lead'];
        $article->content = $request['content'];
        $article->save();
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function addTag(Article $article) {
        $tags = Tag::all();
        return view('article.addtagform', ['article' => $article, 'tags' => $tags]);

    }

    public function joinTag(Request $request, Article $article) {
        $validated = $request->validate([
            'tag' => 'required',
        ]);
        $tag = Tag::find($validated['tag']);
        $article->tags()->syncWithoutDetaching([$tag->id]);
        return redirect()->route('articles.index');
    }
}
