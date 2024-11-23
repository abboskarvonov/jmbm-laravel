<x-layouts.layout>
    <x-slot:title>
        Bosh sahifa
    </x-slot:title>

    <x-hero :latest="$latest_journal" />

    <div class="container grid grid-cols-1 md:grid-cols-3 py-16 gap-10 lg:gap-16 mx-auto max-w-7xl px-8 lg:px-1">
        <div class="col-span-1 md:col-span-2">
            <div>
                @if ($about_journal)
                    <h1 class="text-2xl font-semibold text-indigo-600 border-b-2 border-indigo-600 pb-2 mb-6">
                        {{ $about_journal->name_uz }}
                    </h1>
                    <div class="space-y-3">
                        {!! $about_journal->content_uz !!}
                    </div>
                @endif
            </div>
            <div class="my-10">
                <h1 class="text-2xl font-semibold text-indigo-600 border-b-2 border-indigo-600 pb-2 mb-10">Indekslangan
                    bazalar
                </h1>
                <div class="grid grid-cols-2 lg:grid-cols-4 items-center justify-items-center gap-8">
                    <a href="https://scholar.google.com/scholar?hl=ru&as_sdt=0%2C5&q=%222181-3000%22&btnG="
                        target="_blank"><img src="{{ asset('img/google-scholar.png') }}" alt="Google scholar"></a>
                    <a href="https://journals.indexcopernicus.com/search/details?id=122772" target="_blank"><img
                            src="{{ asset('img/index.png') }}" alt="Index copernicus international"></a>
                    <a href="https://www.citefactor.org/journal/index/29050/journal-of-marketing-business-and-management"
                        target="_blank"><img src="{{ asset('img/citefactor_logo.png') }}" alt="Cite Factor"></a>
                    <a href="https://cyberleninka.ru/journal/n/journal-of-marketing-business-and-management?i=1134150"
                        target="_blank"><img src="{{ asset('img/cyberleninka_logo.png') }}" alt="Cyberleninka"></a>
                    <a href="" target="_blank"><img
                            src="{{ asset('img/Internet_Archive_logo_and_wordmark.png') }}" alt="Internet archive"></a>
                    <a href="https://journalseeker.researchbib.com/view/issn/2181-3000" target="_blank"><img
                            src="{{ asset('img/researchbib.png') }}" alt="Academic resource index"></a>
                    <a href="" target="_blank"><img src="{{ asset('img/zenodo-vector-logo.png') }}"
                            alt="zenodo"></a>
                    <a href="https://sjifactor.com/passport.php?id=22161" target="_blank"><img
                            src="{{ asset('img/scientific.png') }}" alt="Scientific journal impact factor"></a>
                </div>
            </div>
            <div class="mt-8 md:mt-16 lg:mt-22">
                <h1 class="text-2xl font-semibold text-indigo-600 border-b-2 border-indigo-600 pb-2 mb-10">Jurnal
                    sonlari
                </h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">
                    @foreach ($journals as $journal)
                        <div class="grid gap-2 shadow-sm shadow-indigo-600 bg-gray-100 rounded p-4">
                            <a href="{{ route('archive.show', ['archive' => $journal->slug]) }}"
                                class="text-xl text-indigo-600 uppercase font-semibold">{{ $journal->title }}</a>
                            <div class="flex gap-2 items-center">
                                <i class="fa fa-calendar-days"></i>
                                {{ $journal->date }}
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <x-right />
    </div>

</x-layouts.layout>
