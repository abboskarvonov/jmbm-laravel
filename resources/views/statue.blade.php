<x-layouts.layout>
    <x-slot:title>
        {{ $data->name_uz }}
    </x-slot:title>

    <x-header>
        {{ $data->name_uz }}
    </x-header>

    <div class="container grid grid-cols-1 md:grid-cols-3 py-16 gap-10 lg:gap-16 mx-auto max-w-7xl px-8 lg:px-1">
        <div class="col-span-1 md:col-span-2">
            <h1 class="text-2xl font-semibold text-indigo-600 border-b-2 border-indigo-600 pb-2 mb-6">
                {{ $data->name_uz }}
            </h1>
            <div class="space-x-3">
                {!! $data->content_uz !!}
            </div>
            @if ($data->file)
                <div class="max-w-96 mt-5 mx-auto">
                    <a href="{{ $data->file }}" download target="_blank"
                        class="bg-indigo-600 hover:bg-indigo-800 py-3 w-full inline-flex justify-center gap-2 items-center rounded-lg text-white font-semibold"><i
                            class="fa fa-download"></i> Faylni yuklash</a>
                </div>
            @endif
        </div>
        <x-right />
    </div>

</x-layouts.layout>
