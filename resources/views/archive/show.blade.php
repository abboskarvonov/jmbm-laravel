<x-layouts.layout>
    <x-slot:title>
        Jurnal - {{ $journal->title }}
    </x-slot:title>

    <x-header>
        Jurnal
    </x-header>

    <div class="container grid grid-cols-1 md:grid-cols-3 py-16 gap-10 lg:gap-16 mx-auto max-w-7xl px-8 lg:px-1">
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-2xl font-semibold text-indigo-600 border-b-2 border-indigo-600 pb-2 mb-6">
                {{ $journal->title }}
            </h1>
            @auth
                <div class="flex justify-end gap-4 mb-4">
                    <a href="{{ route('archive.edit', ['archive' => $journal->id]) }}"
                        class="py-3 px-6 flex gap-2 items-center bg-indigo-600 rounded text-white hover:bg-indigo-800 transition-all ease-in duration-200"><i
                            class="fa fa-pencil"></i>
                        O'zgartirish</a>
                    <form action="{{ route('archive.destroy', ['archive' => $journal->id]) }}" method="post"
                        onsubmit="return confirm('Jurnalni o\'chirmoqchimisiz?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="py-3 px-6 flex gap-2 items-center bg-red-600 rounded text-white hover:bg-red-800 transition-all ease-in duration-200"><i
                                class="fa fa-trash"></i>
                            O'chirish</button>
                    </form>
                </div>
            @endauth
            <a href="{{ asset('storage/' . $journal->file) }}"
                class="bg-indigo-600 w-full inline-flex gap-2 font-semibold text-white text-xl justify-center py-3 rounded-lg items-center"><i
                    class="fa fa-download"></i>
                Jurnalni yuklash</a>
            <h1 class="text-2xl font-semibold text-indigo-600 border-t-2 pt-2 mt-6 border-indigo-600 pb-2 mb-5">
                Jurnaldagi maqolalar
            </h1>
            @foreach ($articles as $article)
                <div class="grid gap-2 mt-3 mb-4 bg-gray-100 p-5 rounded-xl shadow shadow-indigo-600">
                    <a href="{{ route('articles.show', ['article' => $article->slug]) }}"
                        class="text-xl text-indigo-600 uppercase font-semibold">{{ $article->title }}</a>
                    <div class="flex gap-10">
                        <div class="flex gap-2 items-center">
                            <i class="fa fa-calendar-days"></i>
                            {{ $article->date }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('articles.show', ['article' => $article->slug]) }}"
                            class="bg-indigo-600 py-3 inline-flex items-center gap-2 px-6 text-white rounded-xl">Batafsil
                            <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach

            {{ $articles->links() }}
        </div>
        <x-right />
    </div>

</x-layouts.layout>
