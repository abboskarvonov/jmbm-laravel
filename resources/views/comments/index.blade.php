<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Izohlar
        </h2>
    </x-slot>

    <div class="container max-w-7xl mx-auto my-10">
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden border rounded-lg">
                        <table class="min-w-full divide-y divide-neutral-300">
                            <thead class="bg-neutral-50 dark:bg-neutral-800">
                                <tr class="text-gray-900 dark:text-gray-100">
                                    <th class="px-5 py-3 font-semibold uppercase">ID</th>
                                    <th class="px-5 py-3 font-semibold uppercase">Izoh</th>
                                    <th class="px-5 py-3 font-semibold uppercase">Muallif</th>
                                    <th class="px-5 py-3 font-semibold uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200 bg-gray-50 dark:bg-gray-700">
                                @foreach ($comments as $key)
                                    <tr class="text-neutral-800 text-center dark:text-neutral-200">
                                        <td class="px-5 py-4 font-medium whitespace-nowrap">
                                            {{ $key->id }}
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">{{ $key->body }}</td>
                                        </td>
                                        <td class="px-5 py-4 whitespace-nowrap">{{ $key->user->name }}</td>
                                        </td>
                                        <td
                                            class="px-5 py-4 text font-medium whitespace-nowrap flex gap-3 justify-center">
                                            <form action="{{ route('comments.destroy', ['comment' => $key->id]) }}"
                                                method="post" onsubmit="return confirm('Izohni o\'chirmoqchimisiz?')">
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

        {{ $comments->links() }}
    </div>

</x-app-layout>
