@inject('meta', \App\Models\Meta::class)
<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.meta', [$meta])
    <title>{{ $meta->title }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16.png') }}">
    <link rel="icon" href="{{ asset('favicon.svg') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <!-- <link rel="manifest" href="/site.webmanifest"> -->
    <!-- <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5"> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-K56C3QSR');</script>
    <!-- End Google Tag Manager -->
</head>

<body class="font-sans text-gray-900 antialiased">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K56C3QSR"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center py-6 bg-gray-100 dark:bg-gray-900">
        <div>
            <a href="/" wire:navigate>
                <x-brand.dark-logo class="w-auto h-16 mb-4 text-gray-500 dark:text-gray-300 hover:text-indigo-600" />
            </a>
        </div>
        <div class="max-w-screen-xl mt-4 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
