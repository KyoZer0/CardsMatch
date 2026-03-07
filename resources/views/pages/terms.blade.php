@extends('layouts.app')

@section('title', 'Terms of Service – Cards Match | CardsMatch')
@section('meta_description', 'Terms of Service and usage guidelines for playing the CardsMatch Cards Match game online.')

@section('hero')
    <article class="rebrand-content" style="max-width: 850px; text-align: left;">
        <div style="text-align: center; margin-bottom: 40px;">
            <div class="hero-kicker" style="margin: 0 auto 16px;">
                <span>LEGAL</span>
                <span>The rulebook</span>
            </div>
            <h1 class="rebrand-title" style="margin-bottom: 16px;">
                Terms of Service
            </h1>
            <p class="rebrand-desc">Last updated: March 6, 2026</p>
        </div>
    </article>
@endsection

@section('content')
    <article class="rebrand-content" style="max-width: 850px; text-align: left; margin-top: 0;">
        <div class="review-card" style="box-shadow: 8px 8px 0 var(--wood-light); padding: 40px 48px; margin-bottom: 48px;">
            <div class="blog-body" style="font-size: 1.05rem; color: var(--text-main); line-height: 1.8; font-weight: 600;">
                <h2>1. Acceptance of Terms</h2>
                <p>By accessing and playing this Cards Match game (CardsMatch), you agree to be bound by these Terms of Service. If you do not agree, please do not use the website or Cards Match game.</p>
                
                <h2>2. Intellectual Property</h2>
                <p>All game mechanics, UI design, logos, and custom code are the property of CardsMatch. The high-resolution photographic puzzle packs are licensed appropriately from their respective creators and stock databases. You may not extract or sell these images.</p>
                
                <h2>3. User Conduct</h2>
                <p>CardsMatch is a single-player Cards Match game. You agree not to attempt to breach server security, scrape site assets maliciously, or exploit any mechanical bugs to disrupt the Cards Match service.</p>

                <h2>4. Disclaimer of Warranties</h2>
                <p>The game is provided "as is" and "as available". We do not guarantee continuous, uninterrupted, or perfectly error-free operation. Your local save state is your responsibility.</p>
            </div>
        </div>
    </article>

    <style>
        .blog-body h2 { font-size: 1.6rem; color: var(--wood-dark); margin: 32px 0 16px 0; font-weight: 900; }
        .blog-body p { margin-bottom: 24px; }
    </style>
@endsection

