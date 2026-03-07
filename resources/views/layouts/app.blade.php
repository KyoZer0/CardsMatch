<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @hasSection('title')
            @yield('title') � CardsMatch
        @else
            CardsMatch � Free Online Cards Match Game
        @endif
    </title>

    <meta name="description" content="@yield('meta_description', 'Play CardsMatch, a free online Cards Match game in your browser. Solve relaxing Cards Match levels, unlock new picture packs, and enjoy cozy jigsaw solitaire sessions on desktop or mobile.')">
    <meta name="robots" content="index,follow">
    <meta name="theme-color" content="#f5d8ff">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:site_name" content="CardsMatch">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:title" content="@yield('og_title', trim(View::getSections()['title'] ?? 'CardsMatch � Free Online Cards Match Game'))">
    <meta property="og:description" content="@yield('og_description', View::getSections()['meta_description'] ?? 'Relax with a free Cards Match game online. Complete quests, unlock jigsaw levels, and earn rewards in CardsMatch.')">
    <meta property="og:url" content="{{ url()->current() }}">
    @hasSection('og_image')
        <meta property="og:image" content="@yield('og_image')">
    @endif

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', trim(View::getSections()['title'] ?? 'CardsMatch � Free Online Cards Match Game'))">
    <meta name="twitter:description" content="@yield('og_description', View::getSections()['meta_description'] ?? 'Relax with a free Cards Match game online. Complete quests, unlock jigsaw levels, and earn rewards in CardsMatch.')">
    @hasSection('og_image')
        <meta name="twitter:image" content="@yield('og_image')">
    @endif

    {{-- Structured data for the website --}}
    <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "WebSite",
            "name": "CardsMatch",
            "url": "{{ config('app.url') ?? url('/') }}",
            "potentialAction": {
                "@@type": "SearchAction",
                "target": "{{ (config('app.url') ?? url('/')) }}/blogs?q={search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="page-shell">
        <header class="nav" aria-label="Main navigation">
            <a href="{{ route('home') }}" class="brand">
                <div class="brand-badge" aria-hidden="true">
                    <span>C</span>
                </div>
                <div>
                    <div class="brand-text-title">CardsMatch</div>
                    <div class="brand-text-sub">Cozy tile matching puzzle</div>
                </div>
            </a>

            <nav class="nav-links">
                <a class="nav-link" href="{{ route('home') }}">Overview</a>
                <a class="nav-link" href="{{ route('blogs.index') }}">Blogs</a>
                <a class="nav-link" href="{{ route('game') }}">Play in browser</a>
                <a class="bouncy-btn" href="{{ route('game') }}">Start playing</a>
            </nav>
        </header>

        @yield('hero')

        <main>
            @yield('content')
        </main>

        <footer style="margin-top: 80px; padding-top: 40px; border-top: 4px dashed var(--wood-light); font-size: 0.9rem; color: var(--text-soft); padding-bottom: 40px;">
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 40px; margin-bottom: 40px;">
                <div style="flex: 1; min-width: 200px;">
                    <h4 style="color: var(--wood-dark); font-weight: 800; font-size: 1.1rem; margin-bottom: 16px;">CardsMatch</h4>
                    <p style="font-weight: 600; line-height: 1.6;">A cozy, free online Cards Match game designed to help you relax, focus, and wind down. Play Cards Match levels right in your browser with CardsMatch.</p>
                </div>
                <div style="flex: 1; min-width: 150px;">
                    <h4 style="color: var(--wood-dark); font-weight: 800; font-size: 1.1rem; margin-bottom: 16px;">Game</h4>
                    <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 12px; font-weight: 700;">
                        <li><a href="{{ route('game') }}" style="color: inherit; text-decoration: none;">Play Now</a></li>
                        <li><a href="{{ route('pages.faq') }}" style="color: inherit; text-decoration: none;">FAQ / How to Play</a></li>
                        <li><a href="{{ route('pages.parents') }}" style="color: inherit; text-decoration: none;">Parents Guide</a></li>
                        <li><a href="{{ url('/sitemap.xml') }}" style="color: inherit; text-decoration: none;">Sitemap</a></li>
                    </ul>
                </div>
                <div style="flex: 1; min-width: 150px;">
                    <h4 style="color: var(--wood-dark); font-weight: 800; font-size: 1.1rem; margin-bottom: 16px;">Community</h4>
                    <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 12px; font-weight: 700;">
                        <li><a href="{{ route('blogs.index') }}" style="color: inherit; text-decoration: none;">Blog & Strategies</a></li>
                        <li><a href="{{ route('pages.about') }}" style="color: inherit; text-decoration: none;">About Us</a></li>
                        <li><a href="{{ route('pages.contact') }}" style="color: inherit; text-decoration: none;">Contact Support</a></li>
                    </ul>
                </div>
                <div style="flex: 1; min-width: 150px;">
                    <h4 style="color: var(--wood-dark); font-weight: 800; font-size: 1.1rem; margin-bottom: 16px;">Legal</h4>
                    <ul style="list-style: none; padding: 0; display: flex; flex-direction: column; gap: 12px; font-weight: 700;">
                        <li><a href="{{ route('pages.privacy') }}" style="color: inherit; text-decoration: none;">Privacy Policy</a></li>
                        <li><a href="{{ route('pages.terms') }}" style="color: inherit; text-decoration: none;">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div style="text-align: center; font-weight: 700;">
                &copy; {{ date('Y') }} CardsMatch. All rights reserved. <br>
                Handcrafted with care for puzzle lovers everywhere.
            </div>
        </footer>
    </div>
</body>
</html>



