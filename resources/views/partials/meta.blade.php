<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf_token" value="{{ csrf_token() }}"/>

<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<meta name="title" content="{{ $title ?? config('meta.title') }}"/>
<meta name="keywords" content="{{ config('meta.keywords') }}"/>
<meta name="description" content="{{ config('meta.description') }}">
<meta name="robots" content="index,follow"/>
<meta name="url" content="{{ url()->current() }}">

<meta property=”og:title” content="{{ $title ?? config('meta.title') }}"/>
<meta property="og:description" content="{{ config('meta.description') }}"/>
<meta property=”og:type” content="website"/>
<meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}" />
<meta property="og:site_name" content="{{ config('app.name') }}" />
<meta property="og:url" content="{{ url()->current() }}"/>