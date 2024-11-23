<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Jurnal ma'lumotlari - {{ $about->id }}
        </h2>
    </x-slot>

    <div class="container mx-auto max-w-7xl py-10">
        <div class="flex gap-10 flex-wrap">
            <a class="text-white hover:bg-indigo-700 bg-indigo-600 duration-200 ease-out py-3 px-6 rounded"
                href="{{ route('about.edit', ['about' => $about->id]) }}"><i class="fa fa-edit"></i> O'zgaritirsh</a>
            <form action="{{ route('about.destroy', ['about' => $about->id]) }}" method="post"
                onsubmit="return confirm('Menyuni o\'chirmoqchimisiz?')">
                @csrf
                @method('DELETE')
                <button class="text-white hover:bg-red-700 bg-red-600 duration-200 ease-out py-3 px-6 rounded"
                    type="submit"><i class="fa fa-trash"></i>
                    O'chirish</button>
            </form>
        </div>
        <div class="overflow-hidden border rounded-lg my-10">
            <table class="min-w-full divide-y divide-neutral-200">
                <tbody class="divide-y text-center divide-neutral-200">
                    <tr class="text-neutral-800">
                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">ID:</td>
                        <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $about->id }}</td>
                    </tr>
                    <tr class="text-neutral-800">
                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Name uz:</td>
                        <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $about->name_uz }}</td>
                    </tr>
                    <tr class="text-neutral-800">
                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Name ru:</td>
                        <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $about->name_ru }}</td>
                    </tr>
                    <tr class="text-neutral-800">
                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Name en:</td>
                        <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $about->name_en }}</td>
                    </tr>
                    <tr class="text-neutral-800">
                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Content uz:</td>
                        <td class="px-5 py-4 text-sm whitespace-nowrap">{!! $about->content_uz !!}</td>
                    </tr>
                    <tr class="text-neutral-800">
                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Content ru:</td>
                        <td class="px-5 py-4 text-sm whitespace-nowrap">{!! $about->content_ru !!}</td>
                    </tr>
                    <tr class="text-neutral-800">
                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">Content en:</td>
                        <td class="px-5 py-4 text-sm whitespace-nowrap">{!! $about->content_en !!}</td>
                    </tr>
                    <tr class="text-neutral-800">
                        <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">File:</td>
                        <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $about->file }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
