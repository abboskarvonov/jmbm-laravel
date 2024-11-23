<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menyu - ') . $menu->name_uz }}
        </h2>
    </x-slot>

    <div class="container mx-auto max-w-7xl py-10">
        <div class="flex gap-10 flex-wrap">
            <a class="text-white hover:bg-indigo-700 bg-indigo-600 duration-200 ease-out py-3 px-6 rounded"
                href="{{ route('menus.edit', ['menu' => $menu->id]) }}"><i class="fa fa-edit"></i> O'zgaritirsh</a>
            <form action="{{ route('menus.destroy', ['menu' => $menu->id]) }}" method="post"
                onsubmit="return confirm('Menyuni o\'chirmoqchimisiz?')">
                @csrf
                @method('DELETE')
                <button class="text-white hover:bg-red-700 bg-red-600 duration-200 ease-out py-3 px-6 rounded"
                    type="submit"><i class="fa fa-trash"></i>
                    O'chirish</button>
            </form>
        </div>
        <div class="grid grid-cols-2 gap-2 my-20">
            <div>
                <p class="font-semibold border-b-2 border-gray-300 text-center py-2">ID:</p>
                <p class="font-semibold border-b-2 border-gray-300 text-center py-2">Nomi uz:</p>
                <p class="font-semibold border-b-2 border-gray-300 text-center py-2">Nomi ru:</p>
                <p class="font-semibold border-b-2 border-gray-300 text-center py-2">Nomi en:</p>
                <p class="font-semibold text-center py-2">Manzili:</p>
            </div>
            <div class="">
                <p class="text-indigo-600 border-gray-300 border-b-2 text-center py-2">{{ $menu->id }}</p>
                <p class="text-indigo-600 border-gray-300 border-b-2 text-center py-2">{{ $menu->name_uz }}</p>
                <p class="text-indigo-600 border-gray-300 border-b-2 text-center py-2">{{ $menu->name_ru }}</p>
                <p class="text-indigo-600 border-gray-300 border-b-2 text-center py-2">{{ $menu->name_en }}</p>
                <p class="text-indigo-600 text-center py-2">{{ $menu->slug }}</p>
            </div>
        </div>

    </div>

</x-app-layout>
