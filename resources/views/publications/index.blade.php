@extends('layouts.app')

@section('title', 'Publications & Reports - UNESCO Zimbabwe')
@section('meta_description', 'Download research papers, reports, and publications from UNESCO Zimbabwe covering education, science, culture, and heritage in Southern Africa.')
@section('og_title', 'Publications & Reports - UNESCO Zimbabwe')
@section('og_description', 'Research papers, reports, and publications from UNESCO Zimbabwe and ROSA.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-[#003DA5] text-white py-20">
        <div class="absolute inset-0 bg-gradient-to-r from-[#003DA5] to-[#0072C6] opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Publications & Reports</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">Research papers, reports, and publications from UNESCO Zimbabwe and ROSA.</p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex overflow-x-auto space-x-1">
                    @php
                        $currentCategory = request('category');
                        $categories = [
                            'report' => 'Reports',
                            'newsletter' => 'Newsletters',
                            'handbook' => 'Handbooks',
                            'policy' => 'Policy Papers'
                        ];
                    @endphp
                    
                    <a href="{{ route('publications.index') }}" 
                       class="px-6 py-2 {{ !$currentCategory ? 'bg-[#003DA5] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#E8F4FD] hover:text-[#003DA5]' }} text-sm font-semibold rounded-full whitespace-nowrap transition-colors">
                        All
                    </a>
                    
                    @foreach($categories as $key => $catName)
                        <a href="{{ route('publications.index', ['category' => $key]) }}" 
                           class="px-6 py-2 {{ $currentCategory === $key ? 'bg-[#003DA5] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#E8F4FD] hover:text-[#003DA5]' }} text-sm font-semibold rounded-full whitespace-nowrap transition-colors">
                            {{ $catName }}
                        </a>
                    @endforeach
                </div>
                
                <!-- Search Form -->
                <form action="{{ route('publications.index') }}" method="GET" class="relative">
                    @if($currentCategory)
                        <input type="hidden" name="category" value="{{ $currentCategory }}">
                    @endif
                    <input type="text" 
                           name="search" 
                           placeholder="Search publications..." 
                           value="{{ request('search') }}"
                           class="w-full md:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#003DA5] focus:border-[#003DA5] outline-none">
                    <button type="submit" class="absolute left-3 top-2.5">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Publications Grid -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Check if there are publications -->
            @if($publications->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($publications as $pub)
                        @php
                            $pubImage = $pub->getFirstMediaUrl('cover_image') 
                                ?: ($pub->cover_image ? asset('storage/' . $pub->cover_image) : null);
                            $pubFile = $pub->getFirstMediaUrl('file') 
                                ?: ($pub->file_path ? asset('storage/' . $pub->file_path) : null);
                        @endphp
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow flex flex-col justify-between">
                            <!-- Publication Cover image / Fallback icon -->
                            <div>
                                <div class="h-56 bg-gradient-to-br from-[#003DA5] to-[#0072C6] flex items-center justify-center relative overflow-hidden">
                                    @if($pubImage)
                                        <img src="{{ $pubImage }}" 
                                             alt="{{ $pub->title }}" 
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="text-center px-8">
                                            <svg class="w-12 h-12 text-white/50 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                            <span class="text-white/60 text-sm">PDF Document</span>
                                        </div>
                                    @endif
                                    
                                    <!-- Category Badge -->
                                    <span class="absolute top-3 left-3 bg-[#003DA5] text-white text-xs font-semibold px-2.5 py-1 rounded-full shadow-sm">
                                        {{ isset($categories[$pub->category]) ? $categories[$pub->category] : ucfirst($pub->category) }}
                                    </span>
                                </div>
                                
                                <div class="p-6">
                                    <!-- Year / Date -->
                                    <p class="text-xs text-[#0072C6] font-semibold mb-2">
                                        {{ $pub->publication_date ? $pub->publication_date->format('Y') : $pub->created_at->format('Y') }}
                                    </p>
                                    
                                    <!-- Title -->
                                    <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors line-clamp-2">
                                        <a href="{{ route('publications.show', ['slug' => $pub->slug]) }}">
                                            {{ $pub->title }}
                                        </a>
                                    </h3>
                                    
                                    <!-- Description -->
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                        {{ $pub->description }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="px-6 pb-6 pt-2 border-t border-gray-100 flex items-center justify-between">
                                <!-- Pages / Author -->
                                <span class="text-xs text-gray-500 font-medium">
                                    @if($pub->pages)
                                        {{ $pub->pages }} pages
                                    @else
                                        {{ $pub->author ?? 'UNESCO' }}
                                    @endif
                                </span>
                                
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('publications.show', ['slug' => $pub->slug]) }}" 
                                       class="text-xs text-gray-500 hover:text-[#003DA5] font-semibold transition-colors">
                                        Details
                                    </a>
                                    @if($pubFile)
                                        <a href="{{ $pubFile }}" 
                                           target="_blank"
                                           class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            Download
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    {{ $publications->links() }}
                </div>

            @else
                <!-- No publications found -->
                <div class="text-center py-12 bg-white rounded-xl shadow-sm border border-gray-100">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Publications Found</h3>
                    <p class="text-gray-500">Check back later or adjust your filters.</p>
                </div>
            @endif
        </div>
    </section>
@endsection