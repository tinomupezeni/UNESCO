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
                <button class="px-6 py-2 bg-[#003DA5] text-white text-sm font-semibold rounded-full whitespace-nowrap">All</button>
                <button class="px-6 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-full hover:bg-[#E8F4FD] hover:text-[#003DA5] whitespace-nowrap transition-colors">Conferences</button>
                <button class="px-6 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-full hover:bg-[#E8F4FD] hover:text-[#003DA5] whitespace-nowrap transition-colors">Workshops</button>
                <button class="px-6 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-full hover:bg-[#E8F4FD] hover:text-[#003DA5] whitespace-nowrap transition-colors">Webinars</button>
                <button class="px-6 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-full hover:bg-[#E8F4FD] hover:text-[#003DA5] whitespace-nowrap transition-colors">Meetings</button>
            </div>
        </div>
    </section>

    <!-- Events List -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                <!-- Event 1 - Upcoming -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-48 bg-[#003DA5] text-white p-6 flex flex-col items-center justify-center flex-shrink-0">
                            <span class="text-3xl font-bold">15</span>
                            <span class="text-blue-200 text-sm">FEB</span>
                            <span class="text-blue-300 text-xs mt-1">2025</span>
                        </div>
                        <div class="p-6 flex-1">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">Conference</span>
                                <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded">Upcoming</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                                <a href="#">Southern Africa Education Summit 2025</a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">A regional conference bringing together education ministers, policymakers, and practitioners to discuss the future of education in Southern Africa.</p>
                            <div class="flex flex-wrap items-center text-sm text-gray-500 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Harare International Conference Centre
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    3 Days
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event 2 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-48 bg-[#0072C6] text-white p-6 flex flex-col items-center justify-center flex-shrink-0">
                            <span class="text-3xl font-bold">08</span>
                            <span class="text-blue-200 text-sm">MAR</span>
                            <span class="text-blue-300 text-xs mt-1">2025</span>
                        </div>
                        <div class="p-6 flex-1">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">Workshop</span>
                                <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded">Upcoming</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                                <a href="#">Teacher Training Workshop on Digital Literacy</a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">A hands-on workshop for educators on integrating digital tools and technologies into classroom teaching.</p>
                            <div class="flex flex-wrap items-center text-sm text-gray-500 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    UNESCO ROSA Office, Harare
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    2 Days
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event 3 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-48 bg-[#003DA5] text-white p-6 flex flex-col items-center justify-center flex-shrink-0">
                            <span class="text-3xl font-bold">22</span>
                            <span class="text-blue-200 text-sm">MAR</span>
                            <span class="text-blue-300 text-xs mt-1">2025</span>
                        </div>
                        <div class="p-6 flex-1">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">Webinar</span>
                                <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded">Upcoming</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                                <a href="#">Climate Change and Water Resources in Southern Africa</a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">An online webinar exploring the impact of climate change on water resources and sustainable management strategies.</p>
                            <div class="flex flex-wrap items-center text-sm text-gray-500 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                    </svg>
                                    Online (Zoom)
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    2 Hours
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event 4 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-48 bg-[#0072C6] text-white p-6 flex flex-col items-center justify-center flex-shrink-0">
                            <span class="text-3xl font-bold">10</span>
                            <span class="text-blue-200 text-sm">APR</span>
                            <span class="text-blue-300 text-xs mt-1">2025</span>
                        </div>
                        <div class="p-6 flex-1">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">Meeting</span>
                                <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded">Upcoming</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                                <a href="#">UNESCO-COMESA Joint Programme Review Meeting</a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">A joint review meeting to assess progress on collaborative programmes between UNESCO and COMESA in education and culture.</p>
                            <div class="flex flex-wrap items-center text-sm text-gray-500 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Lusaka, Zambia
                                </span>
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    1 Day
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event 5 - Past -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow opacity-75">
                    <div class="flex flex-col md:flex-row">
                        <div class="md:w-48 bg-gray-500 text-white p-6 flex flex-col items-center justify-center flex-shrink-0">
                            <span class="text-3xl font-bold">18</span>
                            <span class="text-gray-300 text-sm">DEC</span>
                            <span class="text-gray-400 text-xs mt-1">2024</span>
                        </div>
                        <div class="p-6 flex-1">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">Conference</span>
                                <span class="bg-gray-100 text-gray-600 text-xs font-semibold px-2 py-1 rounded">Past Event</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">
                                <a href="#">World Heritage Committee Side Event</a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">A side event on cultural heritage preservation in Southern Africa, featuring presentations from heritage experts and practitioners.</p>
                            <div class="flex flex-wrap items-center text-sm text-gray-500 space-x-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Victoria Falls, Zimbabwe
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More -->
            <div class="mt-12 text-center">
                <button class="bg-[#003DA5] text-white font-semibold py-3 px-8 rounded-lg hover:bg-[#0072C6] transition-colors">
                    Load More Events
                </button>
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
