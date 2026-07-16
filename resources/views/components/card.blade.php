@props(['image' => null, 'title' => null, 'description' => null])

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300']) }}>
    @if ($image)
        <div class="aspect-video overflow-hidden">
            <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        </div>
    @endif
    <div class="p-5">
        @if ($title)
            <h3 class="text-lg font-semibold text-[#003DA5] mb-2">{{ $title }}</h3>
        @endif
        @if ($description)
            <p class="text-gray-600 text-sm leading-relaxed">{{ $description }}</p>
        @endif
        {{ $slot }}
    </div>
</div>
