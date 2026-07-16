@extends('layouts.app')

@section('title', 'About UNESCO Zimbabwe - History, Mission & Team')
@section('meta_description', 'Learn about UNESCO Zimbabwe\'s history since 1986, our mission to build peace through education, science and culture, and meet our dedicated team.')
@section('og_title', 'About UNESCO Zimbabwe')
@section('og_description', 'Discover UNESCO Zimbabwe\'s legacy of partnership and progress in education, science, culture, and communication since 1986.')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-[#003DA5] text-white py-20">
        <div class="absolute inset-0 bg-gradient-to-r from-[#003DA5] to-[#0072C6] opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">About UNESCO Zimbabwe</h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">Building peace through education, science, and culture in Zimbabwe since 1986.</p>
        </div>
    </section>

    <!-- Office History Timeline -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our History</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">A legacy of partnership and progress in Zimbabwe.</p>
            </div>
            <div class="relative">
                <div class="absolute left-1/2 transform -translate-x-1/2 w-0.5 h-full bg-[#0072C6]"></div>
                <div class="space-y-12">
                    <!-- 1986 -->
                    <div class="relative flex items-center justify-between">
                        <div class="w-5/12 text-right pr-8">
                            <div class="bg-[#E8F4FD] p-6 rounded-lg">
                                <h3 class="text-xl font-bold text-[#003DA5] mb-2">1986</h3>
                                <h4 class="font-semibold text-gray-900 mb-2">Establishment of UNESCO Harare</h4>
                                <p class="text-gray-600">UNESCO established its office in Harare, Zimbabwe, to coordinate the organization's activities in education, science, culture, and communication across the country and the sub-region.</p>
                            </div>
                        </div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-[#003DA5] rounded-full border-4 border-white"></div>
                        <div class="w-5/12"></div>
                    </div>

                    <!-- 1990s -->
                    <div class="relative flex items-center justify-between">
                        <div class="w-5/12"></div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-[#0072C6] rounded-full border-4 border-white"></div>
                        <div class="w-5/12 text-left pl-8">
                            <div class="bg-[#E8F4FD] p-6 rounded-lg">
                                <h3 class="text-xl font-bold text-[#003DA5] mb-2">1990s</h3>
                                <h4 class="font-semibold text-gray-900 mb-2">Expanding Programmes</h4>
                                <p class="text-gray-600">UNESCO expanded its programmes in literacy, teacher training, and natural sciences, supporting Zimbabwe's education for all initiatives and cultural heritage preservation.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2000s -->
                    <div class="relative flex items-center justify-between">
                        <div class="w-5/12 text-right pr-8">
                            <div class="bg-[#E8F4FD] p-6 rounded-lg">
                                <h3 class="text-xl font-bold text-[#003DA5] mb-2">2000s</h3>
                                <h4 class="font-semibold text-gray-900 mb-2">Crisis Response & Resilience</h4>
                                <p class="text-gray-600">During challenging times, UNESCO continued its work in Zimbabwe, focusing on capacity building, HIV/AIDS education programmes, and supporting the education sector's resilience.</p>
                            </div>
                        </div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-[#003DA5] rounded-full border-4 border-white"></div>
                        <div class="w-5/12"></div>
                    </div>

                    <!-- 2014 -->
                    <div class="relative flex items-center justify-between">
                        <div class="w-5/12"></div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-[#0072C6] rounded-full border-4 border-white"></div>
                        <div class="w-5/12 text-left pl-8">
                            <div class="bg-[#E8F4FD] p-6 rounded-lg">
                                <h3 class="text-xl font-bold text-[#003DA5] mb-2">2014</h3>
                                <h4 class="font-semibold text-gray-900 mb-2">Became ROSA</h4>
                                <p class="text-gray-600">The Harare office was designated as the Regional Office for Southern Africa (ROSA), expanding its mandate to cover 13 countries in the Southern African region, while maintaining its presence in Zimbabwe.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Today -->
                    <div class="relative flex items-center justify-between">
                        <div class="w-5/12 text-right pr-8">
                            <div class="bg-[#003DA5] p-6 rounded-lg text-white">
                                <h3 class="text-xl font-bold mb-2">Today</h3>
                                <h4 class="font-semibold mb-2">Continued Partnership</h4>
                                <p class="text-blue-100">UNESCO ROSA continues to work closely with the Government of Zimbabwe and partners to advance sustainable development through education, sciences, culture, and communication.</p>
                            </div>
                        </div>
                        <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 bg-white rounded-full border-4 border-[#003DA5]"></div>
                        <div class="w-5/12"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-sm border-l-4 border-[#003DA5]">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-[#E8F4FD] rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-[#003DA5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Our Vision</h2>
                    </div>
                    <p class="text-gray-600 leading-relaxed">A just and inclusive society where every person in Southern Africa has access to quality education, benefits from scientific knowledge, celebrates cultural diversity, and exercises freedom of expression.</p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-sm border-l-4 border-[#0072C6]">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-[#E8F4FD] rounded-full flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-[#0072C6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Our Mission</h2>
                    </div>
                    <p class="text-gray-600 leading-relaxed">To contribute to peace and sustainable development through the promotion of education, natural and social sciences, culture, and communication and information in Southern Africa, working with Member States and partners.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Team</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Dedicated professionals working to make a difference in Southern Africa.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white p-6 rounded-xl shadow-sm text-center border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-24 h-24 bg-[#E8F4FD] rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#003DA5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Regional Director</h3>
                    <p class="text-[#0072C6] font-medium mb-3">UNESCO Regional Office for Southern Africa</p>
                    <p class="text-gray-500 text-sm">Leading the strategic direction and programme delivery across the region.</p>
                </div>

                <!-- Team Member 2 -->
                <div class="bg-white p-6 rounded-xl shadow-sm text-center border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-24 h-24 bg-[#E8F4FD] rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#003DA5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Education Programme Officer</h3>
                    <p class="text-[#0072C6] font-medium mb-3">Education Sector</p>
                    <p class="text-gray-500 text-sm">Overseeing education programmes including literacy, teacher training, and curriculum development.</p>
                </div>

                <!-- Team Member 3 -->
                <div class="bg-white p-6 rounded-xl shadow-sm text-center border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="w-24 h-24 bg-[#E8F4FD] rounded-full mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-12 h-12 text-[#003DA5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Culture Programme Officer</h3>
                    <p class="text-[#0072C6] font-medium mb-3">Culture Sector</p>
                    <p class="text-gray-500 text-sm">Promoting cultural heritage preservation, diversity, and creative industries across the region.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Coverage Area -->
    <section class="py-16 bg-[#003DA5] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Coverage Area</h2>
                <p class="text-blue-100 max-w-2xl mx-auto">UNESCO ROSA serves 13 countries across Southern Africa.</p>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg text-center hover:bg-white/20 transition-colors">
                    <span class="text-lg font-semibold">Zimbabwe</span>
                    <span class="block text-xs text-blue-200 mt-1">Host Country</span>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg text-center hover:bg-white/20 transition-colors">
                    <span class="text-lg font-semibold">Angola</span>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg text-center hover:bg-white/20 transition-colors">
                    <span class="text-lg font-semibold">Botswana</span>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg text-center hover:bg-white/20 transition-colors">
                    <span class="text-lg font-semibold">Eswatini</span>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg text-center hover:bg-white/20 transition-colors">
                    <span class="text-lg font-semibold">Lesotho</span>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg text-center hover:bg-white/20 transition-colors">
                    <span class="text-lg font-semibold">Malawi</span>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg text-center hover:bg-white/20 transition-colors">
                    <span class="text-lg font-semibold">Mauritius</span>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg text-center hover:bg-white/20 transition-colors">
                    <span class="text-lg font-semibold">Mozambique</span>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg text-center hover:bg-white/20 transition-colors">
                    <span class="text-lg font-semibold">Namibia</span>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg text-center hover:bg-white/20 transition-colors">
                    <span class="text-lg font-semibold">South Africa</span>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg text-center hover:bg-white/20 transition-colors">
                    <span class="text-lg font-semibold">Tanzania</span>
                </div>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg text-center hover:bg-white/20 transition-colors">
                    <span class="text-lg font-semibold">Zambia</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Get in Touch</h2>
                <p class="text-gray-600">We'd love to hear from you.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <div class="w-12 h-12 bg-[#E8F4FD] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-[#003DA5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Address</h3>
                    <p class="text-gray-600 text-sm">8 Kenilworth Road<br>Newlands, Highlands<br>Harare, Zimbabwe</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <div class="w-12 h-12 bg-[#E8F4FD] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-[#003DA5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Phone</h3>
                    <p class="text-gray-600 text-sm">+263 242 776775/9</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-sm text-center">
                    <div class="w-12 h-12 bg-[#E8F4FD] rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-[#003DA5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Email</h3>
                    <p class="text-gray-600 text-sm">harare@unesco.org</p>
                </div>
            </div>
        </div>
    </section>
@endsection
