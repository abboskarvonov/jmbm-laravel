<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Maqolalar
        </h2>
    </x-slot>

    <div class="container max-w-7xl mx-auto my-10">
        <a href="{{ route('articles.create') }}"
            class="bg-indigo-600 inline-flex hover:bg-indigo-800 duration-200 ease-out transition-all text-white py-3 px-5 rounded mb-5 items-center gap-2"><i
                class="fa fa-plus"></i> Maqola yaratish</a>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden border rounded-lg">
                        <table class="min-w-full divide-y divide-neutral-300">
                            <thead class="bg-neutral-50 dark:bg-neutral-800">
                                <tr class="text-gray-900 dark:text-gray-100">
                                    <th class="px-5 py-3 font-semibold uppercase">ID</th>
                                    <th class="px-5 py-3 font-semibold uppercase">Name</th>
                                    <th class="px-5 py-3 font-semibold uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200 bg-gray-50 dark:bg-gray-700">
                                @foreach ($articles as $key)
                                    <tr class="text-neutral-800 text-center dark:text-neutral-200">
                                        <td class="px-5 py-4 font-medium whitespace-nowrap">
                                            {{ $key->id }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">{{ $key->title }}</td>
                                        </td>
                                        <td
                                            class="px-5 py-4 text font-medium whitespace-nowrap flex gap-3 justify-center">
                                            <a class="text-gray-600 dark:text-gray-300 hover:text-gray-700"
                                                href="{{ route('articles.show', ['article' => $key->slug]) }}"><i
                                                    class="fa fa-eye"></i></a>
                                            <a class="text-indigo-600 hover:text-indigo-700"
                                                href="{{ route('articles.edit', ['article' => $key->id]) }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <form action="{{ route('articles.destroy', ['article' => $key->id]) }}"
                                                method="post"
                                                onsubmit="return confirm('Jurnalni o\'chirmoqchimisiz?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-600 hover:text-red-700" type="submit"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{ $articles->links() }}
    </div>
</x-app-layout>
