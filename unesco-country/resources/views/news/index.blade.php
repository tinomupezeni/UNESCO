@extends('layouts.app')

@section('title', 'News & Stories - UNESCO Zimbabwe')
@section('meta_description', 'Stay updated with the latest news, stories, and press releases from UNESCO Zimbabwe and the Southern Africa region.')
@section('og_title', 'News & Stories - UNESCO Zimbabwe')
@section('og_description', 'Latest news, stories, and press releases from UNESCO Zimbabwe.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-[#003DA5] text-white py-20">
        <div class="absolute inset-0 bg-gradient-to-r from-[#003DA5] to-[#0072C6] opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">News & Stories</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">Stay updated with the latest news, stories, and press releases from UNESCO Zimbabwe.</p>
        </div>
    </section>

    <!-- Filter Tabs -->
    <section class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex overflow-x-auto py-4 space-x-1">
                @php
                    $currentCategory = request()->query('category');
                @endphp
                <a href="{{ route('news.index') }}" class="px-6 py-2 {{ !$currentCategory ? 'bg-[#003DA5] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#E8F4FD] hover:text-[#003DA5]' }} text-sm font-semibold rounded-full whitespace-nowrap transition-colors">
                    All
                </a>
                <a href="{{ route('news.index', ['category' => 'news']) }}" class="px-6 py-2 {{ $currentCategory === 'news' ? 'bg-[#003DA5] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#E8F4FD] hover:text-[#003DA5]' }} text-sm font-semibold rounded-full whitespace-nowrap transition-colors">
                    News
                </a>
                <a href="{{ route('news.index', ['category' => 'story']) }}" class="px-6 py-2 {{ $currentCategory === 'story' ? 'bg-[#003DA5] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#E8F4FD] hover:text-[#003DA5]' }} text-sm font-semibold rounded-full whitespace-nowrap transition-colors">
                    Stories
                </a>
                <a href="{{ route('news.index', ['category' => 'press_release']) }}" class="px-6 py-2 {{ $currentCategory === 'press_release' ? 'bg-[#003DA5] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#E8F4FD] hover:text-[#003DA5]' }} text-sm font-semibold rounded-full whitespace-nowrap transition-colors">
                    Press Releases
                </a>
            </div>
        </div>
    </section>

    <!-- Articles Grid -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Check if there are articles -->
            @if($articles->count() > 0)
                <!-- Featured Article (only on first page) -->
                @if($articles->currentPage() === 1 && !request()->query('category'))
                    @php
                        $featured = $articles->first();
                        $gridArticles = $articles->slice(1);
                        $featuredImage = $featured->getFirstMediaUrl('featured_image') 
                            ?: ($featured->featured_image ? asset('storage/' . $featured->featured_image) : null);
                    @endphp
                    <div class="mb-12">
                        <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                            <div class="grid md:grid-cols-2">
                                <div class="h-64 md:h-auto min-h-[300px] relative bg-gradient-to-br from-[#003DA5] to-[#0072C6]">
                                    @if($featuredImage)
                                        <img src="{{ $featuredImage }}" alt="{{ $featured->title }}" class="w-full h-full object-cover absolute inset-0">
                                    @else
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <svg class="w-16 h-16 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-8 flex flex-col justify-center">
                                    <div class="flex items-center space-x-3 mb-3">
                                        <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-3 py-1 rounded-full">Featured</span>
                                        <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-3 py-1 rounded-full">{{ ucfirst(str_replace('_', ' ', $featured->category)) }}</span>
                                        <span class="text-gray-500 text-sm">{{ $featured->published_at ? $featured->published_at->format('M d, Y') : $featured->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900 mb-3 hover:text-[#003DA5] transition-colors">
                                        <a href="{{ route('news.show', ['slug' => $featured->slug]) }}">{{ $featured->title }}</a>
                                    </h2>
                                    <p class="text-gray-600 mb-4">{{ Str::limit($featured->excerpt, 200) }}</p>
                                    <a href="{{ route('news.show', ['slug' => $featured->slug]) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                                        Read More
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                @else
                    @php
                        $gridArticles = $articles;
                    @endphp
                @endif

                <!-- Article Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($gridArticles as $art)
                        @php
                            $artImage = $art->getFirstMediaUrl('featured_image') 
                                ?: ($art->featured_image ? asset('storage/' . $art->featured_image) : null);
                        @endphp
                        <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow flex flex-col justify-between">
                            <div>
                                <div class="h-48 relative bg-gradient-to-br from-[#003DA5] to-[#0072C6]">
                                    @if($artImage)
                                        <img src="{{ $artImage }}" alt="{{ $art->title }}" class="w-full h-full object-cover absolute inset-0">
                                    @else
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <svg class="w-12 h-12 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center space-x-3 mb-2">
                                        <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">
                                            {{ ucfirst(str_replace('_', ' ', $art->category)) }}
                                        </span>
                                        <span class="text-gray-500 text-xs">
                                            {{ $art->published_at ? $art->published_at->format('M d, Y') : $art->created_at->format('M d, Y') }}
                                        </span>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                                        <a href="{{ route('news.show', ['slug' => $art->slug]) }}">{{ $art->title }}</a>
                                    </h3>
                                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($art->excerpt, 120) }}</p>
                                </div>
                            </div>
                            <div class="px-6 pb-6">
                                <a href="{{ route('news.show', ['slug' => $art->slug]) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                                    Read More
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    {{ $articles->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No articles found in this category.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
