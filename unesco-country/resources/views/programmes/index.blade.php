@extends('layouts.app')

@section('title', 'Our Programmes - UNESCO Zimbabwe')
@section('meta_description', 'Explore UNESCO Zimbabwe programmes in education, natural sciences, culture, heritage, communication, and information across Southern Africa.')
@section('og_title', 'Our Programmes - UNESCO Zimbabwe')
@section('og_description', 'UNESCO Zimbabwe programmes in education, sciences, culture, and communication for sustainable development.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-[#003DA5] text-white py-20">
        <div class="absolute inset-0 bg-gradient-to-r from-[#003DA5] to-[#0072C6] opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Programmes</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">Working towards sustainable development through education, sciences, culture, and communication.</p>
        </div>
    </section>

    <!-- Programmes Grid -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($programmes->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($programmes as $prog)
                        @php
                            $progImage = $prog->getFirstMediaUrl('featured_image') 
                                ?: ($prog->featured_image ? asset('storage/' . $prog->featured_image) : null);
                        @endphp
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group flex flex-col justify-between">
                            <div>
                                <div class="h-48 bg-gradient-to-br from-[#003DA5] to-[#0072C6] flex items-center justify-center relative overflow-hidden">
                                    @if($progImage)
                                        <img src="{{ $progImage }}" alt="{{ $prog->title }}" class="w-full h-full object-cover absolute inset-0">
                                    @else
                                        <!-- Show icon if present, otherwise default placeholder -->
                                        @if($prog->icon)
                                            <svg class="w-16 h-16 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $prog->icon }}"></path>
                                            </svg>
                                        @else
                                            <svg class="w-16 h-16 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                            </svg>
                                        @endif
                                    @endif
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#003DA5] transition-colors">{{ $prog->title }}</h3>
                                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($prog->description, 150) }}</p>
                                </div>
                            </div>
                            <div class="px-6 pb-6">
                                <a href="{{ route('programmes.show', ['slug' => $prog->slug]) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                                    Learn More
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No programmes found at the moment.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- SDG Alignment -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Aligned with the Sustainable Development Goals</h2>
            <p class="text-gray-600 max-w-2xl mx-auto mb-12">Our programmes contribute directly to multiple SDGs, with particular focus on quality education, climate action, and reduced inequalities.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <div class="w-16 h-16 bg-[#003DA5] rounded-lg flex items-center justify-center text-white font-bold text-xs">SDG 4</div>
                <div class="w-16 h-16 bg-[#0072C6] rounded-lg flex items-center justify-center text-white font-bold text-xs">SDG 6</div>
                <div class="w-16 h-16 bg-[#003DA5] rounded-lg flex items-center justify-center text-white font-bold text-xs">SDG 13</div>
                <div class="w-16 h-16 bg-[#0072C6] rounded-lg flex items-center justify-center text-white font-bold text-xs">SDG 10</div>
                <div class="w-16 h-16 bg-[#003DA5] rounded-lg flex items-center justify-center text-white font-bold text-xs">SDG 16</div>
                <div class="w-16 h-16 bg-[#0072C6] rounded-lg flex items-center justify-center text-white font-bold text-xs">SDG 5</div>
            </div>
        </div>
    </section>
@endsection
