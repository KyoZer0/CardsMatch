@extends('layouts.app')

@section('title', 'Privacy Policy – Cards Match | CardsMatch')
@section('meta_description', 'Privacy Policy for CardsMatch, detailing our commitment to protecting your data while you play our free Cards Match game.')

@section('hero')
    <article class="rebrand-content" style="max-width: 850px; text-align: left;">
        <div style="text-align: center; margin-bottom: 40px;">
            <div class="hero-kicker" style="margin: 0 auto 16px;">
                <span>LEGAL</span>
                <span>Data protection</span>
            </div>
            <h1 class="rebrand-title" style="margin-bottom: 16px;">
                Privacy Policy
            </h1>
            <p class="rebrand-desc">Last updated: March 6, 2026</p>
        </div>
    </article>
@endsection

@section('content')
    <article class="rebrand-content" style="max-width: 850px; text-align: left; margin-top: 0;">
        <div class="review-card" style="box-shadow: 8px 8px 0 var(--wood-light); padding: 40px 48px; margin-bottom: 48px;">
            <div class="blog-body" style="font-size: 1.05rem; color: var(--text-main); line-height: 1.8; font-weight: 600;">
                <h2>1. Information We Collect</h2>
                <p>Our Cards Match game is designed to be as privacy-friendly as possible. We do not require accounts, usernames, or passwords to play. The only data we store is your local Cards Match progress (levels completed, time, moves) which is saved directly in your browser's local storage.</p>
                
                <h2>2. How We Use Your Information</h2>
                <p>Since your game progress is stored locally on your device, we do not have access to it on our servers. Any technical logs our web server collects (like IP addresses and browser types) are purely for maintaining server stability and security, and are never sold or shared.</p>
                
                <h2>3. Cookies and Analytics</h2>
                <p>We may use minimal functional cookies to ensure the website operates correctly and to remember your theme preferences. We do not use invasive third-party tracking scripts.</p>

                <h2>4. Children's Privacy</h2>
                <p>Our Cards Match game is completely safe for all ages. Because we do not collect personal information or offer chat/social features, CardsMatch is fully compliant with COPPA and similar child protection laws worldwide.</p>

                <h2>5. Changes to This Policy</h2>
                <p>If we update this policy, we will post the changes on this page. By continuing to play our Cards Match game, you agree to the latest terms of our Privacy Policy.</p>
            </div>
        </div>
    </article>

    <style>
        .blog-body h2 { font-size: 1.6rem; color: var(--wood-dark); margin: 32px 0 16px 0; font-weight: 900; }
        .blog-body p { margin-bottom: 24px; }
    </style>
@endsection

