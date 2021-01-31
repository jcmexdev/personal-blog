<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords"
        content="@yield('keywords', 'Blog, Programación, Diseño Web, Desarrollo Profesional, jcmexdev')">
    <meta name="description"
        content="@yield('description', 'Hola soy Juan Carlos @jcmexdev y te doy la bienvenida a mi blog donde encontrarás artículos sobre programación, diseño web y desarrollo profesional.')">
    {{-- FACEBOOK --}}
    <meta property="og:url" content="@yield('fb_url', config('app.url'))" />
    <meta property="og:site_name" content="JCMEXDEV | Blog" />
    <meta property="og:locale" content="es_ES">
    <meta property="og:type" content="@yield('fb_type', 'website')" />
    <meta property="og:title" content="@yield('fb_title', 'Juan Carlos García Esquivel')" />
    <meta property="og:description"
        content="@yield('fb_description', 'Blog sobre programación, diseño web y desarrollo profesional.')" />
    <meta property="og:image" content="@yield('fb_image',url('img/jcmexdev-cover.png'))" />
    <meta property="og:image:alt" content="cover">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <meta property="fb:app_id" content="{{ env('FB_APP_ID') }}">
    {{-- TWITTER --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@jcmexdev">
    <meta name="twitter:creator" content="@jcmexdev">
    <meta name="twitter:title" content="@yield('tw_title', 'Juan Carlos García Esquivel')">
    <meta name="twitter:description"
        content="@yield('tw_description', 'Hola soy Juan Carlos y te doy la bienvenida a mi blog donde encontrarás artículos sobre programación, diseño web y desarrollo profesional.')">
    <meta name="twitter:image" content="@yield('tw_image', url('img/jcmexdev-cover.png'))">

    <title>@yield('title', config('app.name').' | Blog')</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/jcmexdev-logo.svg') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/monokai.min.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js" defer></script>
    <script defer>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((block) => {
                hljs.highlightBlock(block);
            });
        });

    </script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @livewire('navigation')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
