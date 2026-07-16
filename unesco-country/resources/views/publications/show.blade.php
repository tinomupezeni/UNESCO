@extends('layouts.app')

@section('title', $publication->title . ' - UNESCO Zimbabwe')

@section('content')
    @php
        $pubImage = $publication->getFirstMediaUrl('cover_image') 
            ?: ($publication->cover_image ? asset('storage/' . $publication->cover_image) : null);
        $pubFile = $publication->getFirstMediaUrl('file') 
            ?: ($publication->file_path ? asset('storage/' . $publication->file_path) : null);
        $categories = [
            'report' => 'Report',
            'newsletter' => 'Newsletter',
            'handbook' => 'Handbook',
            'policy' => 'Policy Paper'
        ];
    @endphp

    <!-- Header Section -->
    <section class="relative bg-[#003DA5] text-white py-16">
        <div class="absolute inset-0 bg-gradient-to-r from-[#003DA5] to-[#0072C6] opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="mb-6">
                <a href="{{ route('publications.index') }}" class="text-blue-200 hover:text-white text-sm flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Publications
                </a>
            </nav>
            <div class="flex items-center mb-4">
                <span class="bg-white/20 text-white text-xs font-semibold px-3 py-1 rounded-full">
                    {{ isset($categories[$publication->category]) ? $categories[$publication->category] : ucfirst($publication->category) }}
                </span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">{{ $publication->title }}</h1>
            <p class="text-xl text-blue-200 max-w-3xl">Published by {{ $publication->author ?? 'UNESCO Zimbabwe' }}</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Left/Main Column: Description & Metadata -->
                <div class="lg:col-span-2">
                    <div class="prose prose-lg max-w-none">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4 font-sans">Document Overview</h2>
                        <div class="text-gray-600 leading-relaxed space-y-6 mb-8 text-lg">
                            {!! nl2br(e($publication->description)) !!}
                        </div>
                    </div>

                    <!-- Metadata Table -->
                    <div class="border border-gray-200 rounded-xl overflow-hidden mt-8">
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                            <h3 class="font-bold text-gray-900">Document Information</h3>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                                <tr>
                                    <td class="px-6 py-4 font-semibold text-gray-500 w-1/3">Author</td>
                                    <td class="px-6 py-4 text-gray-900">{{ $publication->author ?? 'UNESCO' }}</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 font-semibold text-gray-500">Publication Date</td>
                                    <td class="px-6 py-4 text-gray-900">
                                        {{ $publication->publication_date ? $publication->publication_date->format('M d, Y') : $publication->created_at->format('M d, Y') }}
                                    </td>
                                </tr>
                                @if($publication->isbn)
                                <tr>
                                    <td class="px-6 py-4 font-semibold text-gray-500">ISBN</td>
                                    <td class="px-6 py-4 text-gray-900 font-mono">{{ $publication->isbn }}</td>
                                </tr>
                                @endif
                                @if($publication->pages)
                                <tr>
                                    <td class="px-6 py-4 font-semibold text-gray-500">Pages</td>
                                    <td class="px-6 py-4 text-gray-900">{{ $publication->pages }} pages</td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="px-6 py-4 font-semibold text-gray-500">Category</td>
                                    <td class="px-6 py-4 text-gray-900">
                                        {{ isset($categories[$publication->category]) ? $categories[$publication->category] : ucfirst($publication->category) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Right Column: Cover & Download Button -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 flex flex-col items-center">
                        <div class="w-full h-80 bg-gradient-to-br from-[#003DA5] to-[#0072C6] rounded-lg shadow-md overflow-hidden mb-6 flex items-center justify-center relative">
                            @if($pubImage)
                                <img src="{{ $pubImage }}" alt="{{ $publication->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="text-center px-6">
                                    <svg class="w-16 h-16 text-white/40 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                    <span class="text-white/60 text-sm font-semibold">PDF Document</span>
                                </div>
                            @endif
                        </div>

                        @if($pubFile)
                            <a href="{{ $pubFile }}" 
                               target="_blank" 
                               class="w-full bg-[#003DA5] text-white text-center font-bold py-3 px-4 rounded-lg hover:bg-[#0072C6] transition-colors flex items-center justify-center space-x-2 shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                <span>Download PDF</span>
                            </a>
                        @else
                            <button disabled class="w-full bg-gray-300 text-gray-500 py-3 px-4 rounded-lg cursor-not-allowed font-semibold">
                                File Unavailable
                            </button>
                        @endif
                    </div>

                    <!-- Related / Sidebar info -->
                    @if(isset($relatedPublications) && $relatedPublications->count() > 0)
                        <div class="mt-8">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Related Publications</h3>
                            <div class="space-y-4">
                                @foreach($relatedPublications as $rel)
                                    @php
                                        $relImage = $rel->getFirstMediaUrl('cover_image') 
                                            ?: ($rel->cover_image ? asset('storage/' . $rel->cover_image) : null);
                                    @endphp
                                    <a href="{{ route('publications.show', ['slug' => $rel->slug]) }}" class="block group">
                                        <div class="flex items-start space-x-3 bg-white p-3 rounded-lg border border-gray-100 shadow-sm hover:border-[#003DA5] transition-colors">
                                            <div class="w-12 h-16 rounded overflow-hidden bg-gradient-to-br from-[#003DA5] to-[#0072C6] flex-shrink-0 flex items-center justify-center relative">
                                                @if($relImage)
                                                    <img src="{{ $relImage }}" alt="{{ $rel->title }}" class="w-full h-full object-cover">
                                                @else
                                                    <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                                    </svg>
                                                @endif
                                            </div>
                                            <div class="overflow-hidden">
                                                <h4 class="text-sm font-semibold text-gray-900 group-hover:text-[#003DA5] transition-colors truncate">{{ $rel->title }}</h4>
                                                <p class="text-xs text-gray-500 mt-1">{{ $rel->publication_date ? $rel->publication_date->format('Y') : $rel->created_at->format('Y') }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
