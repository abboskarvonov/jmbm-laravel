<div class="w-full shadow shadow-indigo-600">
    <div class="container flex items-center justify-between py-16 px-10 md:px-0 mx-auto flex-row max-w-7xl">
        <div>
            <h1 class="text-xl md:text-2xl lg:text-4xl font-semibold text-indigo-600">
                {{ $slot }}
            </h1>
        </div>
        <div>
            <ul class="flex items-center gap-5">
                <li class="font-bold text-indigo-600">
                    <a href="/"><i class="fa fa-home"></i></a>
                </li>
                <li class="text-indigo-800">
                    <i class="fa fa-chevron-right"></i>
                </li>
                <li class="text-indigo-600">
                    <p>{{ $slot }}</p>
                </li>
            </ul>
        </div>
    </div>

</div>
