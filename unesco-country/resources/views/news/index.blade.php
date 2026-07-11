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
                <button class="px-6 py-2 bg-[#003DA5] text-white text-sm font-semibold rounded-full whitespace-nowrap">All</button>
                <button class="px-6 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-full hover:bg-[#E8F4FD] hover:text-[#003DA5] whitespace-nowrap transition-colors">News</button>
                <button class="px-6 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-full hover:bg-[#E8F4FD] hover:text-[#003DA5] whitespace-nowrap transition-colors">Stories</button>
                <button class="px-6 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-full hover:bg-[#E8F4FD] hover:text-[#003DA5] whitespace-nowrap transition-colors">Press Releases</button>
            </div>
        </div>
    </section>

    <!-- Articles Grid -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Featured Article -->
            <div class="mb-12">
                <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="grid md:grid-cols-2">
                        <div class="h-64 md:h-auto bg-gradient-to-br from-[#003DA5] to-[#0072C6] flex items-center justify-center">
                            <svg class="w-16 h-16 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div class="p-8">
                            <div class="flex items-center space-x-3 mb-3">
                                <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-3 py-1 rounded-full">Featured</span>
                                <span class="text-gray-500 text-sm">January 10, 2025</span>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 mb-3 hover:text-[#003DA5] transition-colors">
                                <a href="{{ route('news.show', ['language' => $language, 'slug' => 'featured-article']) }}">UNESCO Strengthens Education Partnership with Zimbabwe</a>
                            </h2>
                            <p class="text-gray-600 mb-4">UNESCO and the Government of Zimbabwe have signed a new cooperation agreement to strengthen education programmes across the country, focusing on quality teacher training and curriculum development.</p>
                            <a href="{{ route('news.show', ['language' => $language, 'slug' => 'featured-article']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                                Read More
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Article Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Article 1 -->
                <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-[#003DA5] to-[#0072C6] flex items-center justify-center">
                        <svg class="w-12 h-12 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-3 mb-2">
                            <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">News</span>
                            <span class="text-gray-500 text-xs">January 5, 2025</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="{{ route('news.show', ['language' => $language, 'slug' => 'new-literacy-programme']) }}">New Literacy Programme Targets Rural Communities</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">A comprehensive literacy programme has been launched to improve reading and writing skills among children and adults in rural areas of Zimbabwe.</p>
                        <a href="{{ route('news.show', ['language' => $language, 'slug' => 'new-literacy-programme']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                            Read More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Article 2 -->
                <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-[#0072C6] to-[#00A5E0] flex items-center justify-center">
                        <svg class="w-12 h-12 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-3 mb-2">
                            <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">Story</span>
                            <span class="text-gray-500 text-xs">December 28, 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="{{ route('news.show', ['language' => $language, 'slug' => 'water-resource-management']) }}">Water Resource Management Programme Shows Results</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">Communities in three provinces are benefiting from improved water management practices through UNESCO's capacity building initiative.</p>
                        <a href="{{ route('news.show', ['language' => $language, 'slug' => 'water-resource-management']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                            Read More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Article 3 -->
                <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-[#003DA5] to-[#00A5E0] flex items-center justify-center">
                        <svg class="w-12 h-12 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-3 mb-2">
                            <span class="bg-gray-100 text-gray-700 text-xs font-semibold px-2 py-1 rounded">Press Release</span>
                            <span class="text-gray-500 text-xs">December 15, 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="{{ route('news.show', ['language' => $language, 'slug' => 'heritage-preservation']) }}">UNESCO Supports Cultural Heritage Preservation in Zimbabwe</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">New funding has been secured to support the preservation of Zimbabwe's cultural heritage sites and promote cultural tourism.</p>
                        <a href="{{ route('news.show', ['language' => $language, 'slug' => 'heritage-preservation']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                            Read More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Article 4 -->
                <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-[#0072C6] to-[#003DA5] flex items-center justify-center">
                        <svg class="w-12 h-12 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-3 mb-2">
                            <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">News</span>
                            <span class="text-gray-500 text-xs">December 1, 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="{{ route('news.show', ['language' => $language, 'slug' => 'teacher-training']) }}">Regional Teacher Training Initiative Reaches Milestone</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">Over 1,000 teachers from Southern Africa have completed the UNESCO digital skills training programme for educators.</p>
                        <a href="{{ route('news.show', ['language' => $language, 'slug' => 'teacher-training']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                            Read More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Article 5 -->
                <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-[#00A5E0] to-[#0072C6] flex items-center justify-center">
                        <svg class="w-12 h-12 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-3 mb-2">
                            <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">Story</span>
                            <span class="text-gray-500 text-xs">November 20, 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="{{ route('news.show', ['language' => $language, 'slug' => 'press-freedom']) }}">Promoting Press Freedom in Southern Africa</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">A regional workshop on press freedom and journalist safety brought together media professionals from 10 countries.</p>
                        <a href="{{ route('news.show', ['language' => $language, 'slug' => 'press-freedom']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                            Read More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>

                <!-- Article 6 -->
                <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-48 bg-gradient-to-br from-[#003DA5] to-[#0072C6] flex items-center justify-center">
                        <svg class="w-12 h-12 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center space-x-3 mb-2">
                            <span class="bg-gray-100 text-gray-700 text-xs font-semibold px-2 py-1 rounded">Press Release</span>
                            <span class="text-gray-500 text-xs">November 10, 2024</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="{{ route('news.show', ['language' => $language, 'slug' => 'biodiversity-report']) }}">New Report on Biodiversity Conservation in Southern Africa</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">UNESCO publishes a comprehensive assessment of biodiversity challenges and conservation strategies across the region.</p>
                        <a href="{{ route('news.show', ['language' => $language, 'slug' => 'biodiversity-report']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                            Read More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-[#003DA5] bg-[#003DA5] text-sm font-medium text-white">1</a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </section>
@endsection
