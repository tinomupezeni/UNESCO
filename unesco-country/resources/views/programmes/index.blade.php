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
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Programme 1: Education -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group">
                    <div class="h-48 bg-gradient-to-br from-[#003DA5] to-[#0072C6] flex items-center justify-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><circle cx=%2250%22 cy=%2250%22 r=%2240%22 fill=%22none%22 stroke=%22rgba(255,255,255,0.1)%22 stroke-width=%222%22/></svg>')] bg-center bg-no-repeat opacity-50"></div>
                        <svg class="w-16 h-16 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">Education</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#003DA5] transition-colors">Education for All</h3>
                        <p class="text-gray-600 text-sm mb-4">Promoting quality education, literacy, and lifelong learning opportunities for all citizens in Southern Africa.</p>
                        <a href="{{ route('programmes.show', ['language' => $language, 'slug' => 'education']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                            Learn More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Programme 2: Natural Sciences -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group">
                    <div class="h-48 bg-gradient-to-br from-[#0072C6] to-[#00A5E0] flex items-center justify-center relative overflow-hidden">
                        <svg class="w-16 h-16 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-[#E8F4FD] text-[#0072C6] text-xs font-semibold px-2 py-1 rounded">Science</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#003DA5] transition-colors">Natural Sciences</h3>
                        <p class="text-gray-600 text-sm mb-4">Advancing scientific research, water resource management, and biodiversity conservation in the region.</p>
                        <a href="{{ route('programmes.show', ['language' => $language, 'slug' => 'natural-sciences']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                            Learn More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Programme 3: Culture -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group">
                    <div class="h-48 bg-gradient-to-br from-[#00A5E0] to-[#003DA5] flex items-center justify-center relative overflow-hidden">
                        <svg class="w-16 h-16 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-[#E8F4FD] text-[#0072C6] text-xs font-semibold px-2 py-1 rounded">Culture</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#003DA5] transition-colors">Culture & Heritage</h3>
                        <p class="text-gray-600 text-sm mb-4">Preserving cultural heritage, promoting cultural diversity, and supporting creative industries.</p>
                        <a href="{{ route('programmes.show', ['language' => $language, 'slug' => 'culture']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                            Learn More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Programme 4: Communication -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group">
                    <div class="h-48 bg-gradient-to-br from-[#003DA5] to-[#0072C6] flex items-center justify-center relative overflow-hidden">
                        <svg class="w-16 h-16 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">Communication</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#003DA5] transition-colors">Communication & Information</h3>
                        <p class="text-gray-600 text-sm mb-4">Promoting freedom of expression, press freedom, and access to information through media development.</p>
                        <a href="{{ route('programmes.show', ['language' => $language, 'slug' => 'communication']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                            Learn More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Programme 5: Social & Human Sciences -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group">
                    <div class="h-48 bg-gradient-to-br from-[#0072C6] to-[#003DA5] flex items-center justify-center relative overflow-hidden">
                        <svg class="w-16 h-16 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-[#E8F4FD] text-[#0072C6] text-xs font-semibold px-2 py-1 rounded">Social Sciences</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#003DA5] transition-colors">Social & Human Sciences</h3>
                        <p class="text-gray-600 text-sm mb-4">Addressing social challenges through bioethics, youth programmes, and inclusive development policies.</p>
                        <a href="{{ route('programmes.show', ['language' => $language, 'slug' => 'social-sciences']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                            Learn More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Programme 6: ICT -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow group">
                    <div class="h-48 bg-gradient-to-br from-[#00A5E0] to-[#003DA5] flex items-center justify-center relative overflow-hidden">
                        <svg class="w-16 h-16 text-white relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-[#E8F4FD] text-[#003DA5] text-xs font-semibold px-2 py-1 rounded">ICT</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-[#003DA5] transition-colors">ICT in Education</h3>
                        <p class="text-gray-600 text-sm mb-4">Leveraging information and communication technologies to enhance education and knowledge sharing.</p>
                        <a href="{{ route('programmes.show', ['language' => $language, 'slug' => 'ict']) }}" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                            Learn More
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
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
