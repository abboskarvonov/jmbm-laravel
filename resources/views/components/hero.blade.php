<section class="px-2 py-10 bg-white md:px-0 border-b-2 border-indigo-600">
    <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
        <div class="flex flex-wrap items-center sm:-mx-3">
            <div class="w-full lg:w-2/3 md:w-3/5 md:px-3">
                <div
                    class="w-full pb-6 space-y-2 sm:max-w-md lg:max-w-lg md:space-y-3 lg:space-y-5 sm:pr-5 lg:pr-0 md:pb-0">
                    <img src="{{ asset('img/jmbmlogo.png') }}" class="w-40" alt="JMBM Logo">
                    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-3xl">
                        <span class="block xl:inline">Journal of marketing, business and management</span>
                    </h1>
                    <p class="mx-auto text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
                        <i class="fa fa-phone"></i>
                        +998 99 999-99-99
                    </p>
                    <p class="mx-auto text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl">
                        <i class="fa fa-envelope"></i>
                        info@jmbm.uz
                    </p>
                    <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                        @if ($latest)
                            <a href="{{ route('archive.show', ['archive' => $latest->slug]) }}"
                                class="flex items-center w-full px-6 py-3 mb-3 text-white bg-indigo-600 rounded-md sm:mb-0 hover:bg-indigo-600 sm:w-auto"
                                data-primary="indigo-600" data-rounded="rounded-md">
                                Oxirgi son
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-arrow-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        @endif
                        <a href="{{ route('articles.index') }}"
                            class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600"
                            data-rounded="rounded-md">
                            Maqolalar
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-2/5 lg:w-2/6">
                <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl" data-rounded="rounded-xl"
                    data-rounded-max="rounded-full">
                    <img src="{{ asset('img/page.jpg') }}">
                </div>
            </div>
        </div>
    </div>
</section>
