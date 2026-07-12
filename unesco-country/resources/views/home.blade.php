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
            @foreach ([
                ['title' => 'Education', 'desc' => 'Transforming lives through quality education, fostering inclusiveness and lifelong learning for all Zimbabweans.', 'icon' => 'M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z', 'image' => 'programme-education.jpg'],

                ['title' => 'Natural Sciences', 'desc' => 'Advancing scientific research and innovation to address environmental challenges in Zimbabwe.', 'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z', 'image' => 'programme-science.jpg'],
                ['title' => 'Culture', 'desc' => 'Protecting and safeguarding Zimbabwe\'s cultural and natural heritage for future generations.', 'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'image' => 'programme-culture.jpg'],
                ['title' => 'Communication & Information', 'desc' => 'Expanding access to information, media development, and freedom of press in Zimbabwe.', 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z','image' => 'programme-communication.jpg'],
            ] as $programme)
                 <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-200">
        <img src="{{ asset('images/' . $programme['image']) }}" alt="{{ $programme['title'] }}" class="w-full h-40 object-cover">
        <div class="p-6">
            <h3 class="text-xl font-bold text-[#003DA5] mb-2">{{ $programme['title'] }}</h3>
            <p class="text-gray-600 text-sm leading-relaxed">{{ $programme['desc'] }}</p>
            <a href="{{ route('programmes.index', ['language' => $language]) }}" class="inline-block mt-4 text-[#0072C6] font-medium hover:text-[#003DA5] transition-colors text-sm">
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
            @foreach ([
                ['title' => 'UNESCO Supports Zimbabwe\'s Digital Education Transformation', 'date' => 'July 10, 2026', 'desc' => 'New initiative to strengthen ICT standards and practice in schools across Zimbabwe.', 'image' => 'news/digital-education.jpg'],
                ['title' => 'World Heritage Conference Highlights African Heritage', 'date' => 'July 5, 2026', 'desc' => 'Delegates gather to discuss preservation of cultural heritage sites facing climate threats.','image' => 'news/heritage-conference.jpg'],
                ['title' => 'Science Partnership Programme Launched', 'date' => 'June 28, 2026', 'desc' => 'New partnerships established to advance scientific research and innovation in Zimbabwe.','image' => 'news/science-partnership.jpg'],
            ] as $news)
                <x-card image="{{ asset('images/' . $news['image']) }}" title="{{ $news['title'] }}" description="{{ $news['desc'] }}">
                    <p class="text-sm text-gray-400 mt-2">{{ $news['date'] }}</p>
                    <a href="{{ route('news.index', ['language' => $language]) }}" class="inline-block mt-4 text-[#0072C6] font-medium hover:text-[#003DA5] transition-colors">
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
            @foreach ([
                ['title' => 'Annual Report 2025', 'desc' => 'A comprehensive overview of UNESCO activities and achievements in Zimbabwe over the past year.'],
                ['title' => 'Education Policy Brief', 'desc' => 'Key findings and recommendations for strengthening Zimbabwe\'s national education system.'],
                ['title' => 'Heritage Assessment Report', 'desc' => 'Detailed assessment of cultural and natural heritage sites requiring protection in Zimbabwe.'],
            ] as $pub)
                <x-card title="{{ $pub['title'] }}" description="{{ $pub['desc'] }}">
                    <a href="{{ route('publications.index', ['language' => $language]) }}" class="inline-block mt-4 bg-[#0072C6] text-white px-4 py-2 rounded text-sm font-medium hover:bg-[#003DA5] transition-colors">
                        Download PDF
                    </a>
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
