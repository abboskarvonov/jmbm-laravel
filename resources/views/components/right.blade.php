<?php

use App\Models\Article;
$recent_articles = Article::latest()->get()->take(5)->sortDesc();

?>

<div class="col-span-1">
    <h1 class="text-2xl font-semibold text-indigo-600 border-b-2 border-indigo-600 pb-2 mb-6">So'nggi
        maqolalar
    </h1>
    @foreach ($recent_articles as $article)
        <div class="grid gap-2 mt-3 border-indigo-600 border-b-2 pb-2">
            <a href="{{ route('articles.show', ['article' => $article->slug]) }}"
                class="text-lg text-indigo-600 uppercase font-semibold">{{ $article->title }}</a>
            <div class="flex gap-2 items-center">
                <i class="fa fa-user-tie"></i>
                {{ $article->author }}
            </div>
            <div class="flex gap-2 items-center">
                <i class="fa fa-calendar-days"></i>
                {{ $article->date }}
            </div>
        </div>
    @endforeach
</div>
