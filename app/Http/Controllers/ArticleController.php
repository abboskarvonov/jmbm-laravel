<?php

namespace App\Http\Controllers;

use App\Events\ArticleCreated;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\JournalIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return view('articles.index')->with('articles', $articles);
    }

    public function all()
    {
        $articles = Article::latest()->paginate(15);

        return view('articles.all')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('admin-settings');

        $journals = JournalIssue::all()->sortDesc();
        return view('articles.create')->with([
            'journals' => $journals,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        Gate::authorize('admin-settings');

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('articles-files');
        }

        $article = Article::create([
            'title' => $request->title,
            'author' => $request->author,
            'pages' => $request->pages,
            'date' => $request->date,
            'issue_id' => $request->issue_id,
            'keywords' => $request->keywords,
            'annotations' => $request->annotations,
            'file' => $path ?? null,
        ]);

        ArticleCreated::dispatch($article);

        return redirect()->route('articles.all');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        Gate::authorize('admin-settings');

        $journals = JournalIssue::all()->sortDesc();
        return view('articles.edit')->with([
            'article' => $article,
            'journals' => $journals
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreArticleRequest $request, Article $article)
    {
        Gate::authorize('admin-settings');

        if ($request->hasFile('file')) {
            if (isset($article->file)) {
                Storage::delete($article->file);
            }
            $path = $request->file('file')->store('articles-files');
        }

        $article->update([
            'title' => $request->title,
            'author' => $request->author,
            'pages' => $request->pages,
            'date' => $request->date,
            'issue_id' => $request->issue_id,
            'keywords' => $request->keywords,
            'annotations' => $request->annotations,
            'file' => $path ?? $article->file,
        ]);

        return redirect()->route('articles.show', ['article' => $article->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Gate::authorize('admin-settings');

        if (isset($article->file)) {
            Storage::delete($article->file);
        }

        $article->delete();

        return redirect()->route('articles.all');
    }
}
