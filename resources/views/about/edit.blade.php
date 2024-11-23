<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Jurnal ma'lumotlarini o'zgartirish
        </h2>
    </x-slot>

    <div class="container py-16 gap-10 lg:gap-16 mx-auto max-w-7xl px-8 lg:px-1">
        <form action="{{ route('about.update', ['about' => $about->id]) }}" method="POST" class="grid gap-6"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="grid grid-cols-3 gap-10">
                <div>
                    <input type="text" name="name_uz" class="form-input rounded w-full" value="{{ $about->name_uz }}"
                        placeholder="Nomi uz" />
                    @error('name_uz')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="name_ru" class="form-input rounded w-full" value="{{ $about->name_ru }}"
                        placeholder="Nomi ru" />
                    @error('name_ru')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="name_en" class="form-input rounded w-full" value="{{ $about->name_en }}"
                        placeholder="Nomi en" />
                    @error('name_en')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid">
                <textarea name="content_uz" id="myeditorinstance" class="form-textarea rounded" placeholder="Content uz">{{ $about->content_uz }}</textarea>
                @error('content_uz')
                    <p class="text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid">
                <textarea name="content_ru" id="myeditorinstance" class="form-textarea rounded" placeholder="Content ru">{{ $about->content_ru }}</textarea>
                @error('content_ru')
                    <p class="text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid">
                <textarea name="content_en" id="myeditorinstance" class="form-textarea rounded" placeholder="Content en">{{ $about->content_en }}</textarea>
                @error('content_en')
                    <p class="text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-2 gap-10">
                <div>
                    <select name="type" class="form-select rounded w-full" id=""
                        value="{{ $about->type }}">
                        <option value="Sahifa turi" disabled selected>Sahifa turi</option>
                        <option value="1" @if ($about->type === 1) selected @endif>Jurnal
                            haqida</option>
                        <option value="2" @if ($about->type === 2) selected @endif>Tahririyat a'zolari
                        </option>
                        <option value="3" @if ($about->type === 3) selected @endif>Maqola talablari
                        </option>
                        <option value="4" @if ($about->type === 4) selected @endif>Tahririyat nizomi
                        </option>
                    </select>
                </div>
                <div>
                    <input type="file" name="file"
                        class="text-stone-500 border w-full rounded border-black file:mr-5 file:py-3 file:px-4 file:border-none file:text-xs file:font-medium file:bg-indigo-600 file:text-white hover:file:cursor-pointer hover:file:bg-indigo-900 transition-all duration-300"
                        id="">
                    @error('file')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-10">
                <button type="submit"
                    class="bg-indigo-600 text-white rounded py-3 hover:bg-indigo-800 transition-all duration-200 ease-out">Saqlash</button>
                <a href="{{ route('about.show', ['about' => $about->id]) }}"
                    class="bg-red-600 text-white text-center rounded py-3 hover:bg-red-800 transition-all duration-200 ease-out">Bekor
                    qilish</a>
            </div>
        </form>
    </div>

</x-app-layout>
