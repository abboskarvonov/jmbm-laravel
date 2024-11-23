<x-layouts.layout>
    <x-slot:title>
        {{ $members->name_uz }}
    </x-slot:title>

    <x-header>
        {{ $members->name_uz }}
    </x-header>

    <div class="container grid grid-cols-1 md:grid-cols-3 py-16 gap-10 lg:gap-16 mx-auto max-w-7xl px-8 lg:px-1">
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-2xl font-semibold text-indigo-600 border-b-2 border-indigo-600 pb-2 mb-6">
                {{ $members->name_uz }}
            </h1>
            <div class="space-x-3">
                {!! $members->content_uz !!}
            </div>

        </div>
        <x-right />
    </div>

</x-layouts.layout>
