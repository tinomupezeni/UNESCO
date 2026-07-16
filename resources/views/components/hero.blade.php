@props(['title' => '', 'subtitle' => '', 'image' => null])

<section class="relative bg-[#003DA5] text-white overflow-hidden">
    {{-- Background Image --}}
    @if ($image)
        <div class="absolute inset-0">
            <img src="{{ $image }}" alt="" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-[#003DA5]/90 via-[#003DA5]/70 to-[#003DA5]/50"></div>
        </div>
    @else
        <div class="absolute inset-0 bg-gradient-to-br from-[#003DA5] via-[#0072C6] to-[#003DA5]"></div>
    @endif

    {{-- Content --}}
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="max-w-2xl">
            @if ($title)
                <h1 class="text-3xl md:text-5xl font-bold leading-tight mb-4">{{ $title }}</h1>
            @endif
            @if ($subtitle)
                <p class="text-lg md:text-xl text-white/80 mb-8 leading-relaxed">{{ $subtitle }}</p>
            @endif
            @if (isset($cta) && $cta->isNotEmpty())
                <div class="flex flex-wrap gap-4">
                    {{ $cta }}
                </div>
            @endif
            {{ $slot }}
        </div>
    </div>
</section>
