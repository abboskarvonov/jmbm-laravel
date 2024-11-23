<div x-data="{
    slideOverOpen: false
}" class="relative z-50 w-auto h-auto block lg:hidden">
    <button @click="slideOverOpen=true"
        class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors bg-white border rounded-md hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none"><i
            class="fa fa-bars fa-xl"></i></button>
    <template x-teleport="body">
        <div x-show="slideOverOpen" @keydown.window.escape="slideOverOpen=false" class="relative z-[99]">
            <div x-show="slideOverOpen" x-transition.opacity.duration.600ms @click="slideOverOpen = false"
                class="fixed inset-0 bg-black bg-opacity-10"></div>
            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
                        <div x-show="slideOverOpen" @click.away="slideOverOpen = false"
                            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                            class="w-screen max-w-md">
                            <div
                                class="flex flex-col h-full py-5 overflow-y-scroll bg-white border-l shadow-lg border-neutral-100/70">
                                <div class="px-4 sm:px-5">
                                    <div class="flex items-start justify-between pb-1">
                                        <h2 class="text-base font-semibold leading-6 text-gray-900"
                                            id="slide-over-title">JMBM</h2>
                                        <div class="flex items-center h-auto ml-3">
                                            <button @click="slideOverOpen=false"
                                                class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative flex-1 px-4 mt-5 sm:px-5">
                                    <div class="absolute inset-0 px-4 sm:px-5">
                                        <div class="relative h-full overflow-hidden rounded-md">
                                            <nav class="grid gap-4 justify-items-center">
                                                <a href="#_"
                                                    class="relative font-medium leading-6 text-gray-800 transition duration-150 ease-out hover:text-gray-600">
                                                    <span class="block">Home</span>
                                                </a>
                                                <a href="#_"
                                                    class="relative font-medium leading-6 text-gray-800 transition duration-150 ease-out hover:text-gray-600">
                                                    <span class="block">Features</span>
                                                </a>
                                                <a href="#_"
                                                    class="relative font-medium leading-6 text-gray-800 transition duration-150 ease-out hover:text-gray-600">
                                                    <span class="block">Pricing</span>
                                                </a>
                                                <a href="#_"
                                                    class="relative font-medium leading-6 text-gray-800 transition duration-150 ease-out hover:text-gray-600">
                                                    <span class="block">Blog</span>
                                                </a>
                                            </nav>

                                            <div class="flex justify-center mt-5 gap-4">
                                                <a href="#"
                                                    class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-gray-800 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none"
                                                    data-rounded="rounded-md">
                                                    Sign in
                                                </a>
                                                <span class="inline-flex rounded-md shadow-sm">
                                                    <a href="#"
                                                        class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-indigo-600 border border-indigo-700 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                        data-rounded="rounded-md" data-primary="indigo-600">
                                                        Sign up
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>
