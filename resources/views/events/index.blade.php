@extends('layouts.app')

@section('title', 'Events - UNESCO Zimbabwe')
@section('meta_description', 'Conferences, workshops, webinars, and meetings hosted by UNESCO Zimbabwe shaping the future of education and development in Southern Africa.')
@section('og_title', 'Events - UNESCO Zimbabwe')
@section('og_description', 'Upcoming conferences, workshops, and events from UNESCO Zimbabwe.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-[#003DA5] text-white py-20">
        <div class="absolute inset-0 bg-gradient-to-r from-[#003DA5] to-[#0072C6] opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Events</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">Conferences, workshops, webinars, and meetings shaping the future of Southern Africa.</p>
        </div>
    </section>

    <!-- Filter Tabs -->
    <section class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex overflow-x-auto py-4 space-x-1">
                @php
                    $currentType = request('type');
                @endphp
                <a href="{{ route('events.index') }}" class="px-6 py-2 {{ !$currentType ? 'bg-[#003DA5] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#E8F4FD] hover:text-[#003DA5]' }} text-sm font-semibold rounded-full whitespace-nowrap transition-colors font-medium">
                    All
                </a>
                <a href="{{ route('events.index', ['type' => 'conference']) }}" class="px-6 py-2 {{ $currentType === 'conference' ? 'bg-[#003DA5] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#E8F4FD] hover:text-[#003DA5]' }} text-sm font-semibold rounded-full whitespace-nowrap transition-colors font-medium">
                    Conferences
                </a>
                <a href="{{ route('events.index', ['type' => 'workshop']) }}" class="px-6 py-2 {{ $currentType === 'workshop' ? 'bg-[#003DA5] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#E8F4FD] hover:text-[#003DA5]' }} text-sm font-semibold rounded-full whitespace-nowrap transition-colors font-medium">
                    Workshops
                </a>
                <a href="{{ route('events.index', ['type' => 'webinar']) }}" class="px-6 py-2 {{ $currentType === 'webinar' ? 'bg-[#003DA5] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#E8F4FD] hover:text-[#003DA5]' }} text-sm font-semibold rounded-full whitespace-nowrap transition-colors font-medium">
                    Webinars
                </a>
                <a href="{{ route('events.index', ['type' => 'meeting']) }}" class="px-6 py-2 {{ $currentType === 'meeting' ? 'bg-[#003DA5] text-white' : 'bg-gray-100 text-gray-700 hover:bg-[#E8F4FD] hover:text-[#003DA5]' }} text-sm font-semibold rounded-full whitespace-nowrap transition-colors font-medium">
                    Meetings
                </a>
            </div>
        </div>
    </section>

    <!-- Events List -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                @forelse($events as $event)
                    @php
                        // Format the date parts
                        $eventDate = $event->event_date;
                        $day = $eventDate ? \Carbon\Carbon::parse($eventDate)->format('d') : '';
                        $month = $eventDate ? strtoupper(\Carbon\Carbon::parse($eventDate)->format('M')) : '';
                        $year = $eventDate ? \Carbon\Carbon::parse($eventDate)->format('Y') : '';
                        
                        // Select color based on event type
                        $typeColors = [
                            'conference' => 'bg-[#003DA5]',
                            'workshop' => 'bg-[#0072C6]',
                            'webinar' => 'bg-[#00A5E0]',
                            'meeting' => 'bg-purple-600',
                        ];
                        $bgColor = $typeColors[$event->event_type] ?? 'bg-[#003DA5]';
                    @endphp
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                        <div class="flex flex-col md:flex-row">
                            <div class="md:w-48 {{ $bgColor }} text-white p-6 flex flex-col items-center justify-center flex-shrink-0">
                                <span class="text-3xl font-bold">{{ $day }}</span>
                                <span class="text-blue-100 text-sm font-semibold">{{ $month }}</span>
                                <span class="text-blue-200 text-xs mt-1">{{ $year }}</span>
                            </div>
                            <div class="p-6 flex-1">
                                <div class="flex flex-wrap items-center gap-2 mb-2">
                                    <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">
                                        {{ ucfirst($event->event_type) }}
                                    </span>
                                    <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded">
                                        {{ ucfirst($event->status) }}
                                    </span>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                                    <a href="{{ route('events.show', ['slug' => $event->slug]) }}">{{ $event->title }}</a>
                                </h3>
                                <p class="text-gray-600 text-sm mb-3">{{ $event->description }}</p>
                                <div class="flex flex-wrap items-center text-sm text-gray-500 space-x-4">
                                    @if($event->location)
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            {{ $event->location }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 bg-white rounded-xl shadow-sm border border-gray-100">
                        <p class="text-gray-500 text-lg">No events found in this category.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $events->links() }}
            </div>
        </div>
    </section>

    <!-- Calendar CTA -->
    <section class="py-16 bg-[#003DA5] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-4">Never Miss an Event</h2>
            <p class="text-blue-100 max-w-2xl mx-auto mb-8">Subscribe to our events calendar to stay informed about upcoming conferences, workshops, and webinars.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="bg-white text-[#003DA5] font-semibold py-3 px-8 rounded-lg hover:bg-blue-50 transition-colors">
                    Subscribe to Calendar
                </a>
                <a href="{{ route('contact', ['language' => $language]) }}" class="border-2 border-white text-white font-semibold py-3 px-8 rounded-lg hover:bg-white/10 transition-colors">
                    Suggest an Event
                </a>
            </div>
        </div>
    </section>
@endsection
