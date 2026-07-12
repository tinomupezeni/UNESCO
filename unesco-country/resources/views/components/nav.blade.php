@php
    $currentLang = app()->getLocale();
@endphp

<header class="bg-[#003DA5] text-white sticky top-0 z-50 shadow-lg" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('home', ['language' => $currentLang]) }}" class="flex flex-col items-center leading-none">
                <img src="{{ asset('Logo_UNESCO_2021.svg.webp') }}" alt="UNESCO Logo" class="h-10 w-auto">
                
                <span class="text-[7px] font-semibold tracking-wide uppercase">Zimbabwe</span>
            </a>

            {{-- Desktop Navigation --}}
            <nav class="hidden md:flex items-center space-x-1">
                @php
                    $links = [
                        ['label' => __('messages.nav.home'), 'url' => route('home', ['language' => $currentLang])],
                        ['label' => __('messages.nav.about'), 'url' => route('about', ['language' => $currentLang])],
                        ['label' => __('messages.nav.programmes'), 'url' => route('programmes.index', ['language' => $currentLang])],
                        ['label' => __('messages.nav.news'), 'url' => route('news.index', ['language' => $currentLang])],
                        ['label' => __('messages.nav.events'), 'url' => route('events.index', ['language' => $currentLang])],
                        ['label' => __('messages.nav.publications'), 'url' => route('publications.index', ['language' => $currentLang])],
                        ['label' => __('messages.nav.contact'), 'url' => route('contact', ['language' => $currentLang])],
                    ];
                @endphp
                @foreach ($links as $link)
                    <a href="{{ $link['url'] }}"
                       class="px-3 py-2 rounded-md text-sm font-medium hover:bg-white/10 transition-colors duration-200">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            {{-- Search --}}
            <a href="{{ route('search', ['language' => $currentLang]) }}" class="hidden md:flex items-center px-3 py-2 rounded-md text-sm font-medium hover:bg-white/10 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </a>

            {{-- Mobile Menu Button --}}
            <button @click="open = !open" class="md:hidden p-2 rounded-md hover:bg-white/10 transition-colors">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Navigation --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden bg-[#003DA5] border-t border-white/10">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @foreach ($links as $link)
                <a href="{{ $link['url'] }}"
                   class="block px-3 py-2 rounded-md text-base font-medium hover:bg-white/10 transition-colors">
                    {{ $link['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</header>
