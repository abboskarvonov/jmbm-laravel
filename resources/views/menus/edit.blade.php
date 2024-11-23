<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menyu o\'zgartirish - ') . $menu->name_uz }}
        </h2>
    </x-slot>

    <div class="container py-16 gap-10 lg:gap-16 mx-auto max-w-7xl px-8 lg:px-1">
        <form action="{{ route('menus.update', ['menu' => $menu->id]) }}" method="POST" class="grid gap-6"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="grid gap-7">
                <div>
                    <input type="text" name="name_uz" class="form-input rounded w-full" value="{{ $menu->name_uz }}"
                        placeholder="Nomi UZ" />
                    @error('name_uz')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="name_ru" class="form-input rounded w-full" value="{{ $menu->name_ru }}"
                        placeholder="Nomi RU" />
                    @error('name_ru')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="name_en" class="form-input rounded w-full" value="{{ $menu->name_en }}"
                        placeholder="Nomi EN" />
                    @error('name_en')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="slug" class="form-input rounded w-full" placeholder="Slug"
                        value="{{ $menu->slug }}" />
                    @error('slug')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-8">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-800 duration-200 ease-in text-white rounded py-3">Saqlash</button>
                <a href="{{ route('menus.index') }}"
                    class="bg-red-600 text-white text-center hover:bg-red-800 rounded py-3 duration-200 ease-in">Bekor
                    qilish</a>
            </div>
        </form>
    </div>

</x-app-layout>
