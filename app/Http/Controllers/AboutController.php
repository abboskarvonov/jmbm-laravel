<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('admin-settings');

        $about = About::all();
        return view('about.index')->with([
            'about' => $about
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('admin-settings');

        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutRequest $request)
    {
        Gate::authorize('admin-settings');

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('about-files');
        }

        $about = About::create([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'type' => $request->type,
            'content_uz' => $request->content_uz,
            'content_ru' => $request->content_ru,
            'content_en' => $request->content_en,
            'file' => $path ?? null,
        ]);

        return redirect()->route('about.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        Gate::authorize('admin-settings');

        return view('about.show')->with([
            'about' => $about,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        Gate::authorize('admin-settings');

        return view('about.edit')->with([
            'about' => $about,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAboutRequest $request, About $about)
    {
        Gate::authorize('admin-settings');

        if ($request->hasFile('file')) {
            if (isset($about->file)) {
                Storage::delete($about->file);
            }
            $path = $request->file('file')->store('about-files');
        }

        $about->update([
            'name_uz' => $request->name_uz,
            'name_ru' => $request->name_ru,
            'name_en' => $request->name_en,
            'type' => $request->type,
            'content_uz' => $request->content_uz,
            'content_ru' => $request->content_ru,
            'content_en' => $request->content_en,
            'file' => $path ?? $about->file,
        ]);

        return redirect()->route('about.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        Gate::authorize('admin-settings');

        if (isset($about->file)) {
            Storage::delete($about->file);
        }

        $about->delete();

        return redirect()->route('about.index');
    }
}
