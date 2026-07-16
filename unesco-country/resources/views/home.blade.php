@extends('layouts.app')

@section('title', 'UNESCO Zimbabwe - Building Peace Through Cooperation')
@section('meta_description', 'UNESCO Zimbabwe regional office covering education, sciences, culture, communication and information programmes across Southern Africa since 1986.')
@section('og_title', 'UNESCO Zimbabwe')
@section('og_description', 'Building peace through international cooperation in education, sciences, culture, communication, and information across Zimbabwe and Southern Africa.')

@section('content')

<x-hero title="UNESCO Zimbabwe" subtitle="Building peace through international cooperation in education, sciences, culture, communication, and information across Zimbabwe." image="{{ asset('images/hero-bg.jpg') }}">
    <x-slot:cta>
        <a href="{{ route('about', ['language' => $language]) }}" class="inline-block bg-white text-[#003DA5] px-6 py-3 rounded-md font-semibold hover:bg-[#E8F4FD] transition-colors duration-200">
            About Us
        </a>
        <a href="{{ route('programmes.index', ['language' => $language]) }}" class="inline-block border-2 border-white text-white px-6 py-3 rounded-md font-semibold hover:bg-white/10 transition-colors duration-200">
            Our Programmes
        </a>
    </x-slot:cta>
</x-hero>

{{-- About Section --}}
<section id="about" class="py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <img src="{{ asset('images/about-section.jpg') }}" alt="UNESCO Zimbabwe" class="rounded-lg mb-6 w-full h-64 object-cover">
                <h2 class="text-3xl md:text-4xl font-bold text-[#003DA5] mb-4">About UNESCO Zimbabwe</h2>
                <div class="w-20 h-1 bg-[#0072C6] mb-6"></div>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    UNESCO initially established a sub-regional office for education in Southern Africa in 1986. 
                    The UNESCO Regional Office for Southern Africa (ROSA) covers all of UNESCO's programme sectors 
                    in nine countries, with Zimbabwe being one of the key member states.
                </p>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    The office serves as UNESCO's focal point for cooperation with the Southern African Development Community (SADC) 
                    as well as for the Common Market for Eastern and Southern Africa (COMESA).
                </p>
                <a href="{{ route('about', ['language' => $language]) }}" class="inline-block text-[#0072C6] font-semibold hover:text-[#003DA5] transition-colors">
                    Learn more about us &rarr;
                </a>
            </div>
            <div class="bg-[#E8F4FD] rounded-lg p-8">
                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-[#003DA5]">9</div>
                        <div class="text-gray-600 mt-1">Countries Covered</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-[#003DA5]">40+</div>
                        <div class="text-gray-600 mt-1">Years of Service</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-[#003DA5]">5</div>
                        <div class="text-gray-600 mt-1">Programme Sectors</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-[#003DA5]">17</div>
                        <div class="text-gray-600 mt-1">SDGs Addressed</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Programmes Section --}}
<section id="programmes" class="py-16 md:py-24 bg-[#E8F4FD]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-[#003DA5] mb-4">Our Programmes</h2>
            <div class="w-20 h-1 bg-[#0072C6] mx-auto mb-6"></div>
            <p class="max-w-2xl mx-auto text-gray-600 text-lg">
                Discover our key programmes and initiatives making a difference across Zimbabwe.
            </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($programmes as $programme)
                 <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
                     @if($programme->getFirstMediaUrl('featured_image'))
                         <img src="{{ $programme->getFirstMediaUrl('featured_image') }}" alt="{{ $programme->title }}" class="w-full h-40 object-cover">
                     @elseif($programme->featured_image)
                         <img src="{{ asset('storage/' . $programme->featured_image) }}" alt="{{ $programme->title }}" class="w-full h-40 object-cover">
                     @else
                         <div class="w-full h-40 bg-gradient-to-br from-[#003DA5] to-[#0072C6] flex items-center justify-center text-white text-lg font-bold">
                             {{ $programme->title }}
                         </div>
                     @endif
                     <div class="p-6">
                         <h3 class="text-xl font-bold text-[#003DA5] mb-2">{{ $programme->title }}</h3>
                         <p class="text-gray-600 text-sm leading-relaxed">{{ Str::limit($programme->description, 120) }}</p>
                         <a href="{{ route('programmes.show', ['slug' => $programme->slug]) }}" class="inline-block mt-4 text-[#0072C6] font-medium hover:text-[#003DA5] transition-colors text-sm">
                             Discover &rarr;
                         </a>
                     </div>
                 </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Latest News Section --}}
<section id="news" class="py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-[#003DA5] mb-2">Latest News</h2>
                <div class="w-20 h-1 bg-[#0072C6]"></div>
            </div>
            <a href="{{ route('news.index', ['language' => $language]) }}" class="hidden sm:inline-block text-[#0072C6] font-semibold hover:text-[#003DA5] transition-colors">
                View All &rarr;
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($latestArticles as $article)
                @php
                    $articleImage = $article->getFirstMediaUrl('featured_image') 
                        ?: ($article->featured_image ? asset('storage/' . $article->featured_image) : asset('images/news-placeholder.jpg'));
                @endphp
                <x-card image="{{ $articleImage }}" title="{{ $article->title }}" description="{{ Str::limit($article->excerpt, 120) }}">
                    <div class="flex items-center space-x-2 mt-2">
                        <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-0.5 rounded-full">
                            {{ ucfirst(str_replace('_', ' ', $article->category)) }}
                        </span>
                        <span class="text-sm text-gray-400">
                            {{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
                        </span>
                    </div>
                    <a href="{{ route('news.show', ['slug' => $article->slug]) }}" class="inline-block mt-4 text-[#0072C6] font-medium hover:text-[#003DA5] transition-colors">
                        Read More &rarr;
                    </a>
                </x-card>
            @endforeach
        </div>
        <div class="mt-8 text-center sm:hidden">
            <a href="{{ route('news.index', ['language' => $language]) }}" class="inline-block text-[#0072C6] font-semibold hover:text-[#003DA5] transition-colors">
                View All News &rarr;
            </a>
        </div>
    </div>
</section>

{{-- UNESCO Designations Section --}}
<section class="py-16 md:py-24 bg-[#E8F4FD]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-[#003DA5] mb-4">UNESCO Sites in Zimbabwe</h2>
            <div class="w-20 h-1 bg-[#0072C6] mx-auto mb-6"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ([
                ['title' => 'World Heritage Sites', 'count' => '5', 'desc' => 'Great Zimbabwe, Victoria Falls, and more', 'url' => 'https://whc.unesco.org/en/statesparties/zw'],
                ['title' => 'Biosphere Reserves', 'count' => '2', 'desc' => 'Manica and Gonarezhou', 'url' => '#'],
                ['title' => 'Intangible Heritage', 'count' => '3', 'desc' => 'Cultural practices and traditions', 'url' => 'https://ich.unesco.org/en/statesparties/zw'],
                ['title' => 'Creative Cities', 'count' => '1', 'desc' => 'Harare - City of Literature', 'url' => '#'],
            ] as $site)
                <a href="{{ $site['url'] }}" target="_blank" rel="noopener" class="bg-white rounded-lg p-6 shadow-sm hover:shadow-md transition-all duration-200 group">
                    <div class="text-4xl font-bold text-[#0072C6] mb-2">{{ $site['count'] }}</div>
                    <h3 class="text-lg font-bold text-[#003DA5] mb-2 group-hover:text-[#0072C6] transition-colors">{{ $site['title'] }}</h3>
                    <p class="text-gray-600 text-sm">{{ $site['desc'] }}</p>
                    <span class="inline-block mt-4 text-[#0072C6] font-medium text-sm group-hover:text-[#003DA5] transition-colors">
                        Discover &rarr;
                    </span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Publications Section --}}
<section id="publications" class="py-16 md:py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-[#003DA5] mb-2">Publications & Reports</h2>
                <div class="w-20 h-1 bg-[#0072C6]"></div>
            </div>
            <a href="{{ route('publications.index', ['language' => $language]) }}" class="hidden sm:inline-block text-[#0072C6] font-semibold hover:text-[#003DA5] transition-colors">
                View All &rarr;
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($latestPublications as $pub)
                <x-card title="{{ $pub->title }}" description="{{ Str::limit($pub->description, 120) }}">
                    <div class="mt-4 flex items-center justify-between">
                        <a href="{{ route('publications.show', ['slug' => $pub->slug]) }}" class="text-[#0072C6] text-sm font-semibold hover:text-[#003DA5] transition-colors">
                            View Details
                        </a>
                        @if($pub->getFirstMediaUrl('file') || $pub->file_path)
                            <a href="{{ $pub->getFirstMediaUrl('file') ?: asset('storage/' . $pub->file_path) }}" target="_blank" class="bg-[#0072C6] text-white px-4 py-2 rounded text-sm font-medium hover:bg-[#003DA5] transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Download
                            </a>
                        @endif
                    </div>
                </x-card>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="py-16 md:py-24 bg-[#003DA5] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Get Involved with UNESCO Zimbabwe</h2>
        <p class="text-white/80 text-lg max-w-2xl mx-auto mb-8">
            Join us in our mission to build peace through international cooperation. Together we can make a difference in Zimbabwe and beyond.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('contact', ['language' => $language]) }}" class="bg-white text-[#003DA5] px-8 py-3 rounded-md font-semibold hover:bg-[#E8F4FD] transition-colors duration-200">
                Contact Us
            </a>
            <a href="https://www.unesco.org/en/take-action" target="_blank" rel="noopener" class="border-2 border-white text-white px-8 py-3 rounded-md font-semibold hover:bg-white/10 transition-colors duration-200">
                Take Action
            </a>
        </div>
    </div>
</section>

@endsection
