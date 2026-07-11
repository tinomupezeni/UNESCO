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
                    <button class="px-6 py-2 bg-[#003DA5] text-white text-sm font-semibold rounded-full whitespace-nowrap">All</button>
                    <button class="px-6 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-full hover:bg-[#E8F4FD] hover:text-[#003DA5] whitespace-nowrap transition-colors">Reports</button>
                    <button class="px-6 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-full hover:bg-[#E8F4FD] hover:text-[#003DA5] whitespace-nowrap transition-colors">Policy Papers</button>
                    <button class="px-6 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-full hover:bg-[#E8F4FD] hover:text-[#003DA5] whitespace-nowrap transition-colors">Working Papers</button>
                    <button class="px-6 py-2 bg-gray-100 text-gray-700 text-sm font-semibold rounded-full hover:bg-[#E8F4FD] hover:text-[#003DA5] whitespace-nowrap transition-colors">Guidelines</button>
                </div>
                <div class="relative">
                    <input type="text" placeholder="Search publications..." class="w-full md:w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#003DA5] focus:border-[#003DA5] outline-none">
                    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Publications Grid -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Publication 1 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-56 bg-gradient-to-br from-[#003DA5] to-[#0072C6] flex items-center justify-center relative">
                        <div class="text-center px-8">
                            <svg class="w-12 h-12 text-white/50 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span class="text-white/60 text-sm">PDF Document</span>
                        </div>
                        <span class="absolute top-3 left-3 bg-white/20 text-white text-xs font-semibold px-2 py-1 rounded">Report</span>
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-[#0072C6] font-semibold mb-2">2024</p>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="#">Education in Southern Africa: Regional Report 2024</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">A comprehensive analysis of education trends, challenges, and opportunities across the Southern African region.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">PDF, 2.4 MB</span>
                            <a href="#" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Publication 2 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-56 bg-gradient-to-br from-[#0072C6] to-[#00A5E0] flex items-center justify-center relative">
                        <div class="text-center px-8">
                            <svg class="w-12 h-12 text-white/50 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span class="text-white/60 text-sm">PDF Document</span>
                        </div>
                        <span class="absolute top-3 left-3 bg-white/20 text-white text-xs font-semibold px-2 py-1 rounded">Policy Paper</span>
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-[#0072C6] font-semibold mb-2">2024</p>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="#">Digital Transformation in Education: Policy Framework</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">A policy framework for integrating digital technologies into education systems across Southern Africa.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">PDF, 1.8 MB</span>
                            <a href="#" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Publication 3 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-56 bg-gradient-to-br from-[#003DA5] to-[#00A5E0] flex items-center justify-center relative">
                        <div class="text-center px-8">
                            <svg class="w-12 h-12 text-white/50 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span class="text-white/60 text-sm">PDF Document</span>
                        </div>
                        <span class="absolute top-3 left-3 bg-white/20 text-white text-xs font-semibold px-2 py-1 rounded">Working Paper</span>
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-[#0072C6] font-semibold mb-2">2023</p>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="#">Water Resource Management in the Limpopo Basin</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">A working paper on integrated water resource management approaches in the Limpopo River Basin.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">PDF, 3.1 MB</span>
                            <a href="#" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Publication 4 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-56 bg-gradient-to-br from-[#0072C6] to-[#003DA5] flex items-center justify-center relative">
                        <div class="text-center px-8">
                            <svg class="w-12 h-12 text-white/50 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span class="text-white/60 text-sm">PDF Document</span>
                        </div>
                        <span class="absolute top-3 left-3 bg-white/20 text-white text-xs font-semibold px-2 py-1 rounded">Report</span>
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-[#0072C6] font-semibold mb-2">2023</p>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="#">Cultural Heritage Preservation in Zimbabwe: Status Report</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">An assessment of the current state of cultural heritage preservation efforts in Zimbabwe.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">PDF, 4.2 MB</span>
                            <a href="#" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Publication 5 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-56 bg-gradient-to-br from-[#003DA5] to-[#0072C6] flex items-center justify-center relative">
                        <div class="text-center px-8">
                            <svg class="w-12 h-12 text-white/50 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span class="text-white/60 text-sm">PDF Document</span>
                        </div>
                        <span class="absolute top-3 left-3 bg-white/20 text-white text-xs font-semibold px-2 py-1 rounded">Guidelines</span>
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-[#0072C6] font-semibold mb-2">2023</p>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="#">Teacher Professional Development Guidelines</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">Guidelines for establishing effective teacher professional development programmes in Southern Africa.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">PDF, 1.5 MB</span>
                            <a href="#" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Publication 6 -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="h-56 bg-gradient-to-br from-[#00A5E0] to-[#003DA5] flex items-center justify-center relative">
                        <div class="text-center px-8">
                            <svg class="w-12 h-12 text-white/50 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span class="text-white/60 text-sm">PDF Document</span>
                        </div>
                        <span class="absolute top-3 left-3 bg-white/20 text-white text-xs font-semibold px-2 py-1 rounded">Report</span>
                    </div>
                    <div class="p-6">
                        <p class="text-xs text-[#0072C6] font-semibold mb-2">2022</p>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-[#003DA5] transition-colors">
                            <a href="#">Biodiversity Assessment: Zambezi Valley</a>
                        </h3>
                        <p class="text-gray-600 text-sm mb-4">A comprehensive biodiversity assessment of the Zambezi Valley ecosystem and conservation recommendations.</p>
                        <div class="flex items-center justify-between">
                            <span class="text-xs text-gray-500">PDF, 5.7 MB</span>
                            <a href="#" class="inline-flex items-center text-[#003DA5] font-semibold text-sm hover:text-[#0072C6] transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Download
                            </a>
                        </div>
                    </div>
                </div>
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
