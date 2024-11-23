<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menyu yaratish') }}
        </h2>
    </x-slot>

    <div class="container py-16 gap-10 lg:gap-16 mx-auto max-w-7xl px-8 lg:px-1">
        <form action="{{ route('menus.store') }}" method="POST" class="grid gap-6" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-10">
                <div>
                    <input type="text" name="name_uz"
                        class="form-input rounded w-full dark:bg-gray-600 dark:placeholder:text-white"
                        value="{{ old('name_uz') }}" placeholder="Nomi UZ" />
                    @error('name_uz')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="name_ru"
                        class="form-input rounded w-full dark:bg-gray-600 dark:placeholder:text-white"
                        value="{{ old('name_ru') }}" placeholder="Nomi RU" />
                    @error('name_ru')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            <div class="grid grid-cols-2 gap-10">
                <div>
                    <input type="text" name="name_en"
                        class="form-input rounded w-full dark:bg-gray-600 dark:placeholder:text-white"
                        value="{{ old('name_en') }}" placeholder="Nomi EN" />
                    @error('name_en')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="slug"
                        class="form-input rounded w-full dark:bg-gray-600 dark:placeholder:text-white"
                        placeholder="Slug" value="{{ old('slug') }}" />
                    @error('slug')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid">
                <button type="submit"
                    class="bg-white text-black shadow dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white hover:bg-gray-100 duration-200 ease-out transition-all py-3 px-5 rounded mb-5 text-center">Saqlash</button>
            </div>
        </form>
    </div>

</x-app-layout>
