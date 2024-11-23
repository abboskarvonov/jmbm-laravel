<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jurnal ma\'lumotlari') }}
        </h2>
    </x-slot>

    <div class="container max-w-7xl mx-auto my-10">
        <a href="{{ route('about.create') }}"
            class="bg-indigo-600 inline-flex hover:bg-indigo-800 duration-200 ease-out transition-all text-white py-3 px-5 rounded mb-5 items-center gap-2"><i
                class="fa fa-plus"></i> Ma'lumot
            yaratish</a>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden border rounded-lg">
                        <table class="min-w-full divide-y divide-neutral-200">
                            <thead class="bg-neutral-50">
                                <tr class="text-indigo-600">
                                    <th class="px-5 py-3 font-semibold uppercase">ID</th>
                                    <th class="px-5 py-3 font-semibold uppercase">Name</th>
                                    <th class="px-5 py-3 font-semibold uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                                @foreach ($about as $key)
                                    <tr class="text-neutral-800 text-center">
                                        <td class="px-5 py-4 font-medium whitespace-nowrap">
                                            {{ $key->id }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">{{ $key->name_uz }}</td>
                                        <td
                                            class="px-5 py-4 text font-medium whitespace-nowrap flex gap-3 justify-center">
                                            <a class="text-gray-600 hover:text-gray-700"
                                                href="{{ route('about.show', ['about' => $key->id]) }}"><i
                                                    class="fa fa-eye"></i></a>
                                            <a class="text-indigo-600 hover:text-indigo-700"
                                                href="{{ route('about.edit', ['about' => $key->id]) }}"><i
                                                    class="fa fa-edit"></i></a>
                                            <form action="{{ route('about.destroy', ['about' => $key->id]) }}"
                                                method="post" onsubmit="return confirm('Menyuni o\'chirmoqchimisiz?')">
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

    </div>

</x-app-layout>
