@extends('layouts.app')

@section('title', ($article->title ?? 'Article') . ' - UNESCO Zimbabwe')

@section('content')
    <!-- Article Header -->
    <section class="relative bg-[#003DA5] text-white py-16">
        <div class="absolute inset-0 bg-gradient-to-r from-[#003DA5] to-[#0072C6] opacity-90"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="mb-6">
                <a href="{{ route('news.index', ['language' => $language]) }}" class="text-blue-200 hover:text-white text-sm flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to News
                </a>
            </nav>
            <div class="flex items-center space-x-3 mb-4">
                <span class="bg-white/20 text-white text-xs font-semibold px-3 py-1 rounded-full">{{ $article->category ?? 'News' }}</span>
                <span class="text-blue-200 text-sm">{{ $article->date ?? 'January 10, 2025' }}</span>
            </div>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">{{ $article->title ?? 'UNESCO Strengthens Education Partnership with Zimbabwe' }}</h1>
            <div class="flex items-center space-x-4 mt-6">
                <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-white font-medium text-sm">{{ $article->author ?? 'UNESCO Zimbabwe' }}</p>
                    <p class="text-blue-200 text-xs">{{ $article->read_time ?? '5 min read' }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    <section class="bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="h-64 md:h-96 bg-gradient-to-br from-[#003DA5] to-[#0072C6] -mt-8 rounded-xl flex items-center justify-center shadow-lg">
                <svg class="w-20 h-20 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>
    </section>

    <!-- Article Content -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <article class="prose prose-lg max-w-none">
                        <p class="lead text-xl text-gray-600 mb-8">{{ $article->excerpt ?? 'UNESCO and the Government of Zimbabwe have signed a new cooperation agreement to strengthen education programmes across the country, focusing on quality teacher training and curriculum development.' }}</p>

                        <p>The agreement, signed at a ceremony in Harare, marks a significant milestone in the longstanding partnership between UNESCO and Zimbabwe. The new programme will focus on three key areas: improving teacher training and professional development, modernizing curriculum frameworks, and expanding access to quality education in underserved communities.</p>

                        <p>"This partnership represents our shared commitment to ensuring that every child in Zimbabwe has access to quality education," said the UNESCO Regional Director. "Education is the foundation of sustainable development, and we are proud to work alongside the Government of Zimbabwe to strengthen the education system."</p>

                        <h2>Key Components of the Programme</h2>

                        <p>The new cooperation agreement includes several key components that will be implemented over the next five years:</p>

                        <ul>
                            <li><strong>Teacher Training:</strong> A comprehensive professional development programme for 5,000 teachers across all provinces, focusing on modern pedagogical methods and digital literacy.</li>
                            <li><strong>Curriculum Development:</strong> Support for the review and updating of national curriculum frameworks to ensure they meet international standards.</li>
                            <li><strong>Education Access:</strong> Targeted interventions to improve access to quality education for marginalized groups, including girls, rural communities, and persons with disabilities.</li>
                            <li><strong>Monitoring and Evaluation:</strong> Establishment of a robust monitoring and evaluation framework to track progress and ensure accountability.</li>
                        </ul>

                        <h2>Expected Impact</h2>

                        <p>The programme is expected to directly benefit over 100,000 students and 5,000 teachers in the first three years of implementation. Indirectly, it will contribute to improving educational outcomes across the country by strengthening institutional capacity and promoting best practices in education.</p>

                        <p>UNESCO has been working in Zimbabwe since 1986, supporting the country's efforts to achieve education for all. This new agreement builds on decades of successful collaboration and reflects the organization's continued commitment to supporting Zimbabwe's development priorities.</p>

                        <blockquote class="border-l-4 border-[#003DA5] pl-6 py-2 my-8">
                            <p class="text-gray-600 italic text-lg">"Education is the most powerful weapon which you can use to change the world. Through this partnership, we are investing in the future of Zimbabwe and the entire Southern African region."</p>
                            <cite class="text-sm text-gray-500 not-italic mt-2 block">- UNESCO Regional Director</cite>
                        </blockquote>

                        <h2>Looking Ahead</h2>

                        <p>The cooperation agreement will be implemented in phases, with the first phase focusing on policy development and capacity building. The programme will work closely with the Ministry of Primary and Secondary Education, as well as other government agencies, civil society organizations, and international partners.</p>

                        <p>As part of the programme, UNESCO will also support the establishment of a national education research centre to provide evidence-based guidance for policy development and programme implementation.</p>
                    </article>

                    <!-- Share Buttons -->
                    <div class="mt-12 pt-8 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">Share this article</h3>
                                <p class="text-gray-500 text-sm">Help spread the word about this story.</p>
                            </div>
                            <div class="flex space-x-3">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#1877F2] text-white rounded-full flex items-center justify-center hover:opacity-80 transition-opacity">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($article->title ?? 'Article') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#1DA1F2] text-white rounded-full flex items-center justify-center hover:opacity-80 transition-opacity">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($article->title ?? 'Article') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#0A66C2] text-white rounded-full flex items-center justify-center hover:opacity-80 transition-opacity">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode(($article->title ?? 'Article') . ' ' . request()->url()) }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-[#25D366] text-white rounded-full flex items-center justify-center hover:opacity-80 transition-opacity">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <!-- Related Articles -->
                    <div class="bg-gray-50 p-6 rounded-xl mb-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Related Articles</h3>
                        <div class="space-y-4">
                            <a href="#" class="block group">
                                <div class="flex items-start space-x-3">
                                    <div class="w-16 h-16 bg-gradient-to-br from-[#003DA5] to-[#0072C6] rounded-lg flex-shrink-0 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">January 5, 2025</p>
                                        <h4 class="text-sm font-semibold text-gray-900 group-hover:text-[#003DA5] transition-colors">New Literacy Programme Targets Rural Communities</h4>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block group">
                                <div class="flex items-start space-x-3">
                                    <div class="w-16 h-16 bg-gradient-to-br from-[#0072C6] to-[#00A5E0] rounded-lg flex-shrink-0 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">December 28, 2024</p>
                                        <h4 class="text-sm font-semibold text-gray-900 group-hover:text-[#003DA5] transition-colors">Water Resource Management Programme Shows Results</h4>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block group">
                                <div class="flex items-start space-x-3">
                                    <div class="w-16 h-16 bg-gradient-to-br from-[#003DA5] to-[#00A5E0] rounded-lg flex-shrink-0 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">December 15, 2024</p>
                                        <h4 class="text-sm font-semibold text-gray-900 group-hover:text-[#003DA5] transition-colors">UNESCO Supports Cultural Heritage Preservation</h4>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block group">
                                <div class="flex items-start space-x-3">
                                    <div class="w-16 h-16 bg-gradient-to-br from-[#0072C6] to-[#003DA5] rounded-lg flex-shrink-0 flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">December 1, 2024</p>
                                        <h4 class="text-sm font-semibold text-gray-900 group-hover:text-[#003DA5] transition-colors">Regional Teacher Training Initiative Reaches Milestone</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Newsletter Signup -->
                    <div class="bg-[#003DA5] text-white p-6 rounded-xl">
                        <h3 class="text-lg font-bold mb-2">Stay Updated</h3>
                        <p class="text-blue-100 text-sm mb-4">Subscribe to our newsletter for the latest news and updates.</p>
                        <form class="space-y-3">
                            <input type="email" placeholder="Your email address" class="w-full px-4 py-2 rounded-lg text-gray-900 text-sm focus:ring-2 focus:ring-white focus:outline-none">
                            <button type="submit" class="w-full bg-white text-[#003DA5] font-semibold py-2 px-4 rounded-lg hover:bg-blue-50 transition-colors text-sm">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
