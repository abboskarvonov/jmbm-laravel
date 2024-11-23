<x-layouts.layout>
    <x-slot:title>
        Jurnal sonlari
    </x-slot:title>

    <x-header>
        Jurnal sonlari
    </x-header>

    <div class="container grid grid-cols-1 md:grid-cols-3 py-16 gap-10 lg:gap-16 mx-auto max-w-7xl px-8 lg:px-1">
        <div class="col-span-1 md:col-span-2">
            @auth
                @if (auth()->user()->isAdmin)
                    <a href="{{ route('archive.create') }}"
                        class="bg-indigo-600 inline-flex hover:bg-indigo-800 duration-200 ease-out transition-all text-white py-3 px-5 rounded mb-5 items-center gap-2"><i
                            class="fa fa-plus"></i>Jurnal yaratish</a>
                @endif
            @endauth
            <h1 class="text-2xl font-semibold text-indigo-600 border-b-2 border-indigo-600 pb-2 mb-6">Jurnal sonlari
            </h1>
            @foreach ($journals as $journal)
                <div class="grid gap-2 mt-3 mb-4 bg-gray-100 p-5 rounded-xl shadow shadow-indigo-600">
                    <a href="{{ route('archive.show', ['archive' => $journal->slug]) }}"
                        class="text-xl text-indigo-600 uppercase font-semibold">{{ $journal->title }}</a>
                    <div class="flex gap-10">
                        <div class="flex gap-2 items-center">
                            <i class="fa fa-calendar-days"></i>
                            {{ $journal->date }}
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('archive.show', ['archive' => $journal->slug]) }}"
                            class="bg-indigo-600 py-3 inline-flex items-center gap-2 px-6 text-white rounded-xl">Batafsil
                            <i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            @endforeach

            {{ $journals->links() }}

        </div>
        <x-right />
    </div>

</x-layouts.layout>
