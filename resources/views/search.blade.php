@extends('layouts.app')

@section('title', 'Search - UNESCO Zimbabwe')

@section('content')
    <section class="relative bg-[#003DA5] text-white py-20">
        <div class="absolute inset-0 bg-gradient-to-r from-[#003DA5] to-[#0072C6] opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Search</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">Find articles, programmes, events, and publications.</p>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('search', ['language' => $language]) }}" method="GET" class="mb-8">
                <div class="flex gap-2">
                    <input type="text" name="q" value="{{ $query }}" placeholder="Search..." autofocus
                           class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#003DA5] focus:border-[#003DA5] outline-none text-gray-900">
                    <button type="submit" class="bg-[#003DA5] text-white px-6 py-3 rounded-lg font-semibold hover:bg-[#0072C6] transition-colors">
                        Search
                    </button>
                </div>
            </form>

            @if($query && strlen($query) >= 2)
                <p class="text-gray-600 mb-6">{{ $totalResults }} result{{ $totalResults !== 1 ? 's' : '' }} for "{{ $query }}"</p>

                @if($articles->count())
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-[#003DA5] mb-4">News & Articles</h2>
                        <div class="space-y-4">
                            @foreach($articles as $article)
                                <a href="{{ route('news.show', ['language' => $language, 'slug' => $article->slug]) }}" class="block bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <h3 class="font-bold text-gray-900 hover:text-[#003DA5]">{{ $article->getTranslation('title', app()->getLocale()) }}</h3>
                                    <p class="text-gray-600 text-sm mt-1">{{ Str::limit(strip_tags($article->getTranslation('excerpt', app()->getLocale()) ?? $article->getTranslation('content', app()->getLocale())), 150) }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($programmes->count())
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-[#003DA5] mb-4">Programmes</h2>
                        <div class="space-y-4">
                            @foreach($programmes as $programme)
                                <a href="{{ route('programmes.show', ['language' => $language, 'slug' => $programme->slug]) }}" class="block bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <h3 class="font-bold text-gray-900 hover:text-[#003DA5]">{{ $programme->getTranslation('title', app()->getLocale()) }}</h3>
                                    <p class="text-gray-600 text-sm mt-1">{{ Str::limit(strip_tags($programme->getTranslation('description', app()->getLocale())), 150) }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($events->count())
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-[#003DA5] mb-4">Events</h2>
                        <div class="space-y-4">
                            @foreach($events as $event)
                                <a href="{{ route('events.show', ['language' => $language, 'slug' => $event->slug]) }}" class="block bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <h3 class="font-bold text-gray-900 hover:text-[#003DA5]">{{ $event->getTranslation('title', app()->getLocale()) }}</h3>
                                    <p class="text-gray-600 text-sm mt-1">{{ Str::limit(strip_tags($event->getTranslation('description', app()->getLocale())), 150) }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($publications->count())
                    <div class="mb-8">
                        <h2 class="text-xl font-bold text-[#003DA5] mb-4">Publications</h2>
                        <div class="space-y-4">
                            @foreach($publications as $publication)
                                <a href="{{ route('publications.show', ['language' => $language, 'slug' => $publication->slug]) }}" class="block bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <h3 class="font-bold text-gray-900 hover:text-[#003DA5]">{{ $publication->getTranslation('title', app()->getLocale()) }}</h3>
                                    <p class="text-gray-600 text-sm mt-1">{{ Str::limit(strip_tags($publication->getTranslation('description', app()->getLocale())), 150) }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($totalResults === 0)
                    <div class="text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <p class="text-gray-500 text-lg">No results found for "{{ $query }}".</p>
                        <p class="text-gray-400 mt-2">Try different keywords or check your spelling.</p>
                    </div>
                @endif
            @elseif($query)
                <div class="text-center py-12">
                    <p class="text-gray-500">Please enter at least 2 characters to search.</p>
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <p class="text-gray-500 text-lg">Enter a search term to find content across our site.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
