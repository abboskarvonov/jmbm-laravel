<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Jurnal o'zgartirsh - {{ $journal->id }}
        </h2>
    </x-slot>

    <div class="container py-16 gap-10 lg:gap-16 mx-auto max-w-7xl px-8 lg:px-1">
        <form action="{{ route('archive.update', ['archive' => $journal->id]) }}" method="POST" class="grid gap-6"
            enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="grid grid-cols-2 gap-10">
                <div>
                    <input type="text" name="title" class="form-input rounded w-full" value="{{ $journal->title }}"
                        placeholder="Nomi" />
                    @error('title')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="date" name="date" class="form-input rounded w-full" placeholder="Sanasi"
                        value="{{ $journal->date }}" />
                    @error('date')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid">
                @if ($journal->file)
                    <p class="text-red-600 font-semibold mb-2">Fayl yuklangan! Yangi fayl yuklashni xoxlasangiz faylni
                        tanlang.</p>
                @endif
                <input type="file" name="file"
                    class="text-stone-500 border rounded border-black file:mr-5 file:py-3 file:px-4 file:border-none file:text-xs file:font-medium file:bg-indigo-600 file:text-white hover:file:cursor-pointer hover:file:bg-indigo-900 transition-all duration-300"
                    id="">
                @error('file')
                    <p class="text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid grid-cols-2 gap-10">
                <button type="submit"
                    class="bg-indigo-600 text-white rounded py-3 hover:bg-indigo-800 transition-all duration-200 ease-out">Saqlash</button>
                <a href="{{ route('archive.show', ['archive' => $journal->slug]) }}"
                    class="bg-red-600 text-white text-center rounded py-3 hover:bg-red-800 transition-all duration-200 ease-out">Bekor
                    qilish</a>
            </div>
        </form>
    </div>

</x-app-layout>
