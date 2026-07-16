@extends('layouts.app')

@section('title', $event->title . ' - UNESCO Zimbabwe')

@section('content')
    @php
        $typeColors = [
            'conference' => 'bg-[#003DA5]',
            'workshop' => 'bg-[#0072C6]',
            'webinar' => 'bg-[#00A5E0]',
            'meeting' => 'bg-purple-600',
        ];
        $bgColor = $typeColors[$event->event_type] ?? 'bg-[#003DA5]';
    @endphp

    <!-- Hero Section -->
    <section class="relative bg-[#003DA5] text-white py-20">
        <div class="absolute inset-0 bg-gradient-to-r from-[#003DA5] to-[#0072C6] opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="mb-6">
                <a href="{{ route('events.index') }}" class="text-blue-200 hover:text-white text-sm flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Events
                </a>
            </nav>
            <div class="flex items-center space-x-3 mb-4">
                <span class="bg-white/20 text-white text-xs font-semibold px-3 py-1 rounded-full">
                    {{ ucfirst($event->event_type) }}
                </span>
                <span class="bg-white/20 text-white text-xs font-semibold px-3 py-1 rounded-full">
                    {{ ucfirst($event->status) }}
                </span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $event->title }}</h1>
            <p class="text-xl text-blue-100 max-w-3xl">{{ $event->description }}</p>
        </div>
    </section>

    <!-- Event Detail Content -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="prose prose-lg max-w-none">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Event Details</h2>
                        <div class="text-gray-600 leading-relaxed space-y-6 mb-8 text-lg">
                            {!! $event->content !!}
                        </div>
                    </div>
                </div>

                <!-- Sidebar Details -->
                <div class="lg:col-span-1">
                    <!-- Key Facts Card -->
                    <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 mb-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Event Info</h3>
                        <div class="space-y-4 text-sm">
                            <div>
                                <span class="text-gray-500 block">Date & Time</span>
                                <span class="font-semibold text-gray-900 text-base">
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}
                                    @if($event->event_end_date)
                                        - {{ \Carbon\Carbon::parse($event->event_end_date)->format('M d, Y') }}
                                    @endif
                                </span>
                            </div>
                            @if($event->location)
                                <div>
                                    <span class="text-gray-500 block">Location</span>
                                    <span class="font-semibold text-gray-900 text-base">{{ $event->location }}</span>
                                </div>
                            @endif
                            <div>
                                <span class="text-gray-500 block">Event Type</span>
                                <span class="font-semibold text-gray-900 text-base">{{ ucfirst($event->event_type) }}</span>
                            </div>
                        </div>

                        @if($event->registration_url)
                            <a href="{{ $event->registration_url }}" target="_blank" rel="noopener" class="mt-6 w-full {{ $bgColor }} text-white text-center font-semibold py-3 px-4 rounded-lg block hover:opacity-90 transition-opacity">
                                Register / Join Event
                            </a>
                        @endif
                    </div>

                    <!-- Related Events -->
                    @if(isset($relatedEvents) && $relatedEvents->count() > 0)
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Other Events</h3>
                            <div class="space-y-4">
                                @foreach($relatedEvents as $rel)
                                    @php
                                        $relBg = $typeColors[$rel->event_type] ?? 'bg-[#003DA5]';
                                    @endphp
                                    <a href="{{ route('events.show', ['slug' => $rel->slug]) }}" class="block group">
                                        <div class="flex items-start space-x-3 bg-white p-3 rounded-lg border border-gray-100 shadow-sm hover:border-[#003DA5] transition-colors">
                                            <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center text-white {{ $relBg }}">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            <div class="overflow-hidden">
                                                <h4 class="text-sm font-semibold text-gray-900 group-hover:text-[#003DA5] transition-colors truncate">{{ $rel->title }}</h4>
                                                <p class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::parse($rel->event_date)->format('M d, Y') }}</p>
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
