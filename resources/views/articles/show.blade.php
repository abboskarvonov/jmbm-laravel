<x-layouts.layout>
    <x-slot:title>
        Maqolalar
    </x-slot:title>

    <x-header>
        Maqola sarlovhasi
    </x-header>

    <div class="container grid grid-cols-1 md:grid-cols-3 py-16 gap-10 lg:gap-16 mx-auto max-w-7xl px-8 lg:px-1">
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-2xl font-semibold text-indigo-600 uppercase text-center pb-2 mb-6">
                {{ $article->title }}</h1>
            @auth
                <div class="flex justify-end gap-4">
                    <a href="{{ route('articles.edit', ['article' => $article->id]) }}"
                        class="py-3 px-6 flex gap-2 items-center bg-indigo-600 rounded text-white hover:bg-indigo-800 transition-all ease-in duration-200"><i
                            class="fa fa-pencil"></i>
                        O'zgartirish</a>
                    <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="post"
                        onsubmit="return confirm('Maqolani o\'chirmoqchimisiz?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="py-3 px-6 flex gap-2 items-center bg-red-600 rounded text-white hover:bg-red-800 transition-all ease-in duration-200"><i
                                class="fa fa-trash"></i>
                            O'chirish</button>
                    </form>
                </div>
            @endauth
            <p class="mb-3"><b>Annotatsiya:</b> {{ $article->annotations }}</p>
            <p class="mb-3"><b>Kalit so'zlar:</b> {{ $article->keywords }}</p>
            <div class="flex gap-4 flex-wrap mb-3">
                <p><i class="fa fa-user-tie"></i> <b>Mualliflar:</b> {{ $article->author }}</p>
                <p><b>Maqola sahifalari:</b> {{ $article->pages }}</p>
                <p><b>Maqola sanasi:</b> {{ $article->date }}</p>
            </div>
            <iframe src="{{ asset('storage/' . $article->file) }}" width="100%" class="rounded-lg mb-3" height="400"
                frameborder="0"></iframe>
            <a href="{{ asset('storage/' . $article->file) }}" download
                class="bg-indigo-600 flex justify-center py-3 rounded-lg items-center gap-2 text-white font-semibold text-xl hover:bg-indigo-800 transition-all duration-200 ease-in"><i
                    class="fa fa-download"></i> Maqolani yuklash</a>
            <div class="mt-10">
                <div>
                    <h3 class="text-2xl font-semibold"><i class="fa fa-comments"></i> {{ $article->comments->count() }}
                        ta izoh
                    </h3>
                    @foreach ($article->comments as $comment)
                        <div class="mt-4">
                            <blockquote class="relative w-full mx-auto">
                                <div class="flex items-center justify-between">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <img class="w-10 h-10 rounded-full"
                                                src="https://cdn.devdojo.com/images/june2023/johndoe.png"
                                                alt="John Doe">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-base font-semibold text-gray-800">
                                                {{ $comment->user->name }}
                                            </div>
                                            <div class="text-xs text-gray-500">{{ $comment->created_at }}</div>
                                        </div>
                                    </div>
                                    @auth
                                        @canany(['update', 'delete', 'admin-settings'], $comment)
                                            <div class="flex">
                                                <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}"
                                                    method="post" onsubmit="return confirm('Izohni o\'chirmoqchimisiz?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-red-600 px-2 py-1 rounded text-white text-sm"
                                                        type="submit"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        @endcanany
                                    @endauth
                                </div>
                                <div class="relative z-10 mt-3">
                                    <p class="text-gray-800"><em>
                                            {{ $comment->body }}
                                        </em></p>
                                </div>
                            </blockquote>
                        </div>
                    @endforeach
                </div>
                @auth
                    <form action="{{ route('comments.store') }}" method="post" class="mt-10">
                        @csrf
                        <div class="grid gap-2">
                            <label for="">Izoh qoldirish</label>
                            <textarea name="message" rows="4" class="form-textarea rounded" placeholder="Izoh matni"></textarea>
                        </div>
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="mt-4">
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-800 duration-150 ease-in text-white rounded py-3 px-5">Izoh
                                yuborish</button>
                        </div>
                    </form>
                @else
                    <h1 class="text-2xl font-semibold mt-10">Izoh qoldirish uchun ro'yxatdan o'ting!</h1>
                    <span class="inline-flex rounded-md shadow-sm mt-5">
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                            data-rounded="rounded-md" data-primary="blue-600">
                            Sign up
                        </a>
                    </span>
                @endauth
            </div>
        </div>
        <x-right />
    </div>

</x-layouts.layout>
