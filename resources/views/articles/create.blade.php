<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Maqola yaratish
        </h2>
    </x-slot>

    <div class="container py-16 gap-10 lg:gap-16 mx-auto max-w-7xl px-8 lg:px-1">
        <form action="{{ route('articles.store') }}" method="POST" class="grid gap-6" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-10">
                <div>
                    <input type="text" name="title" class="form-input rounded w-full" value="{{ old('title') }}"
                        placeholder="Nomi" />
                    @error('title')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="author" class="form-input rounded w-full"
                        value="{{ old('author') }}"placeholder="Mualliflar" />
                    @error('author')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-3 gap-10">
                <div>
                    <input type="text" name="pages" class="form-input rounded w-full" placeholder="Sahifalar"
                        value="{{ old('pages') }}" />
                    @error('pages')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="date" name="date" class="form-input rounded w-full" placeholder="Sanasi"
                        value="{{ old('date') }}" />
                    @error('date')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <select name="issue_id" class="form-select rounded w-full" value="{{ old('issue_id') }}">
                        <option disabled selected>Jurnalni tanlang</option>
                        @foreach ($journals as $journal)
                            <option value="{{ $journal->id }}">{{ $journal->title }}</option>
                        @endforeach
                    </select>
                    @error('issue_id')
                        <p class="text-red-600 font-semibold">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 gap-10">
                <textarea name="keywords" rows="4" class="form-textarea rounded" placeholder="Kalit so'zlar"></textarea>
                <textarea name="annotations" rows="4" class="form-textarea rounded" placeholder="Annotatsiya"></textarea>
            </div>
            <div class="grid">
                <input type="file" name="file"
                    class="text-stone-500 border rounded border-black file:mr-5 file:py-3 file:px-4 file:border-none file:text-xs file:font-medium file:bg-indigo-600 file:text-white hover:file:cursor-pointer hover:file:bg-indigo-900 transition-all duration-300"
                    id="">
                @error('file')
                    <p class="text-red-600 font-semibold">{{ $message }}</p>
                @enderror
            </div>
            <div class="grid">
                <button type="submit" class="bg-indigo-600 text-white rounded py-3">Saqlash</button>
            </div>
        </form>
    </div>

</x-app-layout>
