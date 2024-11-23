@php
    use App\Models\Menu;

    $menus = Menu::all();
@endphp

<section class="bg-indigo-600">
    <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
        <nav class="flex flex-wrap justify-center -mx-5 -my-2">
            @foreach ($menus as $menu)
                <div class="px-5 py-2">
                    <a href="{{ $menu->slug }}" class="text-base leading-6 text-gray-100 hover:text-gray-300">
                        {{ $menu->name_uz }}
                    </a>
                </div>
            @endforeach
        </nav>
        <div class="flex justify-center mt-8 space-x-6">
            <a href="#" class="text-gray-400 hover:text-gray-100">
                <i class="fa-brands fa-telegram fa-xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-100">
                <i class="fa-brands fa-facebook fa-xl"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-gray-100">
                <i class="fa fa-envelope fa-xl"></i>
            </a>
        </div>
        <p class="mt-8 text-base leading-6 text-center text-gray-400">
            &copy; 2024 - {{ date('Y') }}, Journal of marketing, business and management. All rights reserved.
        </p>
    </div>
</section>
