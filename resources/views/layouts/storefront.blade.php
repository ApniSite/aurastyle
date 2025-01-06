<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.meta')
    <title>{{ $title ?? config('meta.title') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16.png') }}">
    <link rel="icon" href="{{ asset('favicon.svg') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <!-- <link rel="manifest" href="/site.webmanifest"> -->
    <!-- <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5"> -->
    @vite('resources/css/app.css')
    <!-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> -->
    @livewireStyles
    @include('partials.gtm')
</head>

<body class="font-sans text-gray-900 antialiased">
    @include('partials.gtm-noscript')
    <div class="min-h-screen flex flex-col">
    <livewire:components.navigation />

    <main class="grow">
        {{ $slot }}
    </main>

    <x-footer />
    </div>
    @livewireScripts
</body>

</html>
