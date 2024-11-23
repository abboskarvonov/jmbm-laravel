<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJournalIssueRequest;
use App\Models\Article;
use App\Models\JournalIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class JournalIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journals = JournalIssue::latest()->paginate(8);
        return view('archive.index')->with([
            'journals' => $journals
        ]);
    }

    public function all()
    {
        $journals = JournalIssue::latest()->paginate(15);
        return view('archive.all')->with([
            'journals' => $journals
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('admin-settings');

        return view('archive.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJournalIssueRequest $request)
    {
        Gate::authorize('admin-settings');

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('journal-files');
        }

        $article = JournalIssue::create([
            'title' => $request->title,
            'date' => $request->date,
            'file' => $path ?? null,
        ]);

        return redirect()->route('archive.all');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $journal = JournalIssue::where('slug', $slug)->first();
        $articles = Article::where('issue_id', $journal->id)->paginate(5);
        return view('archive.show')->with([
            'journal' => $journal,
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JournalIssue $archive)
    {
        Gate::authorize('admin-settings');

        return view('archive.edit')->with([
            'journal' => $archive
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreJournalIssueRequest $request, JournalIssue $archive)
    {
        Gate::authorize('admin-settings');

        if ($request->hasFile('file')) {
            if (isset($article->file)) {
                Storage::delete($article->file);
            }
            $path = $request->file('file')->store('journal-files');
        }

        $archive->update([
            'title' => $request->title,
            'date' => $request->date,
            'file' => $path ?? $archive->file,
        ]);

        return redirect()->route('archive.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JournalIssue $archive)
    {
        Gate::authorize('admin-settings');

        if (isset($archive->file)) {
            Storage::delete($archive->file);
        }

        $archive->delete();

        return redirect()->route('archive.all');
    }
}
