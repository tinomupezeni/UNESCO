@extends('layouts.app')

@section('title', $programme->title ?? 'Programme Detail' . ' - UNESCO Zimbabwe')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-[#003DA5] text-white py-20">
        <div class="absolute inset-0 bg-gradient-to-r from-[#003DA5] to-[#0072C6] opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="mb-6">
                <a href="{{ route('programmes.index', ['language' => $language]) }}" class="text-blue-200 hover:text-white text-sm flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to Programmes
                </a>
            </nav>
            <div class="flex items-center mb-4">
                <span class="bg-white/20 text-white text-xs font-semibold px-3 py-1 rounded-full">
                    {{ $programme->sector ?? 'Education' }}
                </span>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $programme->title ?? 'Education for All' }}</h1>
            <p class="text-xl text-blue-100 max-w-3xl">{{ $programme->subtitle ?? 'Promoting quality education, literacy, and lifelong learning opportunities for all citizens in Southern Africa.' }}</p>
        </div>
    </section>

    <!-- Programme Content -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="prose prose-lg max-w-none">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">About this Programme</h2>
                        <div class="text-gray-600 leading-relaxed mb-8">
                            <p>{{ $programme->description ?? 'UNESCO works with the Government of Zimbabwe and partners to ensure inclusive and equitable quality education and promote lifelong learning opportunities for all. Our education programmes focus on early childhood care and education, primary and secondary education, teacher training, literacy, and non-formal education.' }}</p>

                            <p class="mt-4">{{ $programme->description_extended ?? 'We support policy development, capacity building, and innovative approaches to education delivery, with a focus on reaching the most marginalized and vulnerable populations, including girls, rural communities, and persons with disabilities.' }}</p>
                        </div>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Key Focus Areas</h2>
                        <div class="grid sm:grid-cols-2 gap-4 mb-8">
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-[#E8F4FD] rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                                    <svg class="w-3 h-3 text-[#003DA5]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700">Teacher Training & Professional Development</span>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-[#E8F4FD] rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                                    <svg class="w-3 h-3 text-[#003DA5]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700">Curriculum Development</span>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-[#E8F4FD] rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                                    <svg class="w-3 h-3 text-[#003DA5]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700">Literacy & Lifelong Learning</span>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-[#E8F4FD] rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                                    <svg class="w-3 h-3 text-[#003DA5]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700">Education Policy Support</span>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-[#E8F4FD] rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                                    <svg class="w-3 h-3 text-[#003DA5]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700">Gender Equality in Education</span>
                            </div>
                            <div class="flex items-start">
                                <div class="w-6 h-6 bg-[#E8F4FD] rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                                    <svg class="w-3 h-3 text-[#003DA5]" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700">Education for Sustainable Development</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Key Facts -->
                    <div class="bg-[#E8F4FD] p-6 rounded-xl mb-8">
                        <h3 class="text-lg font-bold text-[#003DA5] mb-4">Key Facts</h3>
                        <div class="space-y-4">
                            <div>
                                <span class="text-sm text-gray-500">Region</span>
                                <p class="font-semibold text-gray-900">Southern Africa</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-500">Focus Countries</span>
                                <p class="font-semibold text-gray-900">13 Countries</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-500">Key Partners</span>
                                <p class="font-semibold text-gray-900">Government, UNICEF, World Bank</p>
                            </div>
                            <div>
                                <span class="text-sm text-gray-500">SDG Alignment</span>
                                <p class="font-semibold text-gray-900">SDG 4: Quality Education</p>
                            </div>
                        </div>
                    </div>

                    <!-- Download Resources -->
                    <div class="bg-white border border-gray-200 p-6 rounded-xl mb-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Resources</h3>
                        <div class="space-y-3">
                            <a href="#" class="flex items-center text-gray-700 hover:text-[#003DA5] transition-colors">
                                <svg class="w-5 h-5 mr-3 text-[#0072C6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="text-sm font-medium">Programme Report 2024</span>
                            </a>
                            <a href="#" class="flex items-center text-gray-700 hover:text-[#003DA5] transition-colors">
                                <svg class="w-5 h-5 mr-3 text-[#0072C6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="text-sm font-medium">Strategic Framework</span>
                            </a>
                            <a href="#" class="flex items-center text-gray-700 hover:text-[#003DA5] transition-colors">
                                <svg class="w-5 h-5 mr-3 text-[#0072C6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <span class="text-sm font-medium">Country Profile</span>
                            </a>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="bg-[#003DA5] text-white p-6 rounded-xl">
                        <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                        <p class="text-blue-100 text-sm mb-4">Interested in learning more about this programme?</p>
                        <a href="{{ route('contact', ['language' => $language]) }}" class="block text-center bg-white text-[#003DA5] font-semibold py-2 px-4 rounded-lg hover:bg-blue-50 transition-colors">
                            Get in Touch
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related News -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Related News & Updates</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-40 bg-gradient-to-br from-[#003DA5] to-[#0072C6] flex items-center justify-center">
                        <svg class="w-10 h-10 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-semibold text-[#0072C6]">January 15, 2025</span>
                        <h3 class="text-lg font-bold text-gray-900 mt-2 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="#">New Literacy Programme Launches in Zimbabwe</a>
                        </h3>
                        <p class="text-gray-600 text-sm">UNESCO partners with the Ministry of Education to launch a new national literacy programme targeting rural communities.</p>
                    </div>
                </article>

                <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-40 bg-gradient-to-br from-[#0072C6] to-[#00A5E0] flex items-center justify-center">
                        <svg class="w-10 h-10 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-semibold text-[#0072C6]">December 8, 2024</span>
                        <h3 class="text-lg font-bold text-gray-900 mt-2 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="#">Teacher Training Workshop Held in Harare</a>
                        </h3>
                        <p class="text-gray-600 text-sm">Over 200 teachers from across Zimbabwe participated in a week-long professional development workshop on STEM education.</p>
                    </div>
                </article>

                <article class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-40 bg-gradient-to-br from-[#003DA5] to-[#00A5E0] flex items-center justify-center">
                        <svg class="w-10 h-10 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-semibold text-[#0072C6]">November 20, 2024</span>
                        <h3 class="text-lg font-bold text-gray-900 mt-2 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="#">Education Policy Dialogue on Inclusion</a>
                        </h3>
                        <p class="text-gray-600 text-sm">Stakeholders gather to discuss strategies for inclusive education and ensuring no child is left behind in Southern Africa.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>
@endsection
