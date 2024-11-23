@php
    use App\Models\Menu;

    $menus = Menu::all();
@endphp

<section class="relative w-full px-8 text-gray-700 bg-indigo-600 body-font" data-tails-scripts="//unpkg.com/alpinejs"
    {!! $attributes ?? '' !!}>
    <div class="container flex items-center justify-between py-5 mx-auto flex-row max-w-7xl">
        <a href="/"
            class="relative z-10 flex text-center md:text-left items-center text-xl w-auto font-bold leading-none text-white select-none">
            <p>JMBM</p>
        </a>

        <nav
            class="top-0 left-0 z-0 lg:flex items-center justify-center w-full h-full py-5 -ml-0 space-x-5 text-base md:-ml-5 md:py-0 md:absolute hidden">
            @foreach ($menus as $menu)
                <a href="{{ $menu->slug }}"
                    class="relative font-medium leading-6 text-white transition duration-150 ease-out hover:text-gray-200"
                    x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                    <span class="block">{{ $menu->name_uz }}</span>
                    <span class="absolute bottom-0 left-0 inline-block w-full h-0.5 -mb-1 overflow-hidden">
                        <span x-show="hover" class="absolute inset-0 inline-block w-full h-full transform bg-gray-200"
                            x-transition:enter="transition ease duration-200" x-transition:enter-start="scale-0"
                            x-transition:enter-end="scale-100" x-transition:leave="transition ease-out duration-300"
                            x-transition:leave-start="scale-100" x-transition:leave-end="scale-0"></span>
                    </span>
                </a>
            @endforeach
        </nav>
        <div class="relative z-10 lg:inline-flex hidden items-center space-x-3 md:ml-5 lg:justify-end">
            @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex gap-2 items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  bg-white  hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                @if (auth()->user()->photo)
                                    <img src="{{ auth()->user()->photo }}" alt=""
                                        class="object-cover w-8 h-8 border rounded-full border-neutral-200">
                                @else
                                    <img src="https://static.vecteezy.com/system/resources/previews/029/271/062/non_2x/avatar-profile-icon-in-flat-style-male-user-profile-illustration-on-isolated-background-man-profile-sign-business-concept-vector.jpg"
                                        alt="" class="object-cover w-8 h-8 border rounded-full border-neutral-200">
                                @endif
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('Dashboard') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="inline-flex gap-2 items-center justify-center px-4 py-2 text-base font-medium leading-6 text-gray-800 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none"
                    data-rounded="rounded-md">
                    <i class="fa fa-right-to-bracket"></i> Login
                </a>
                <span class="inline-flex rounded-md shadow-sm">
                    <a href="{{ route('register') }}"
                        class="inline-flex gap-2 items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-blue-600 border border-blue-700 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        data-rounded="rounded-md" data-primary="blue-600">
                        <i class="fa fa-user-plus"></i> Ro'yxatdan o'tish
                    </a>
                </span>
            @endauth
        </div>
        <x-mobile />
    </div>
</section>
