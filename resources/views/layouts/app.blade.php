@php
    if ($language = request()->route('language')) {
        app()->setLocale($language);
    }
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Meta --}}
    <title>@yield('title', config('app.name', 'UNESCO Zimbabwe'))</title>
    <meta name="description" content="@yield('meta_description', 'UNESCO Zimbabwe - Building peace through international cooperation in education, sciences, culture, communication, and information.')">
    <meta name="keywords" content="@yield('meta_keywords', 'UNESCO, Zimbabwe, education, science, culture, heritage, Harare')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ request()->url() }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('og_title', 'UNESCO Zimbabwe')">
    <meta property="og:description" content="@yield('og_description', 'Building peace through international cooperation in education, sciences, culture, communication, and information across Zimbabwe.')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:site_name" content="UNESCO Zimbabwe">
    <meta property="og:locale" content="{{ app()->getLocale() === 'fr' ? 'fr_FR' : 'en_US' }}">
    <meta property="og:image" content="@yield('og_image', asset('images/unesco-logo.webp'))">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'UNESCO Zimbabwe')">
    <meta name="twitter:description" content="@yield('og_description', 'Building peace through international cooperation in education, sciences, culture, communication, and information across Zimbabwe.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/unesco-logo.webp'))">

    {{-- Structured Data --}}
    <script type="application/ld+json">
    @yield('structured_data', json_encode([
        "@context" => "https://schema.org",
        "@type" => "Organization",
        "name" => "UNESCO Zimbabwe",
        "url" => request()->url(),
        "logo" => asset('images/unesco-logo.webp'),
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => "8 Kenilworth Road",
            "addressLocality" => "Newlands, Highlands",
            "addressRegion" => "Harare",
            "addressCountry" => "ZW"
        ],
        "telephone" => "+263242776775",
        "email" => "harare@unesco.org"
    ]))
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900 antialiased" x-data="{ mobileMenuOpen: false }">

    {{-- Navigation --}}
    <x-nav />

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <x-footer />

</body>
</html>
