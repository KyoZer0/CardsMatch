@extends('layouts.app')

@section('title', 'Frequently Asked Questions – Cards Match | CardsMatch')
@section('meta_description', 'Answers to the most common questions about playing our free Cards Match game. Learn about saving Cards Match progress, unlocking new picture packs, and more.')

@section('hero')
    <article class="rebrand-content" style="max-width: 850px; text-align: left;">
        <div style="text-align: center; margin-bottom: 40px;">
            <div class="hero-kicker" style="margin: 0 auto 16px;">
                <span>HELP</span>
                <span>Common questions</span>
            </div>
            <h1 class="rebrand-title" style="margin-bottom: 16px;">
                Frequently Asked Questions
            </h1>
            <p class="rebrand-desc">Everything you need to know about our Cards Match game.</p>
        </div>
    </article>
@endsection

@section('content')
    <article class="rebrand-content" style="max-width: 850px; text-align: left; margin-top: 0;">
        <div class="review-card" style="box-shadow: 8px 8px 0 var(--wood-light); padding: 40px 48px; margin-bottom: 48px;">
            <div class="blog-body" style="font-size: 1.05rem; color: var(--text-main); line-height: 1.8; font-weight: 600;">
                <h2>Is this Cards Match completely free?</h2>
                <p>Yes! CardsMatch is a 100% free Cards Match game. There are no paywalls, microtransactions, or premium currencies.</p>
                
                <h2>How does Cards Match saving work?</h2>
                <p>Your Cards Match progress is saved directly in your browser's local storage. As long as you don't clear your browser data or use Incognito mode, your unlocked Cards Match levels and star ratings will remain the next time you visit.</p>
                
                <h2>Can I play Cards Match on my phone?</h2>
                <p>Absolutely. CardsMatch is fully optimized for touch on iOS and Android devices. For the best Cards Match experience, we recommend playing in landscape mode for larger puzzles.</p>

                <h2>How do I earn 3 stars?</h2>
                <p>Stars are awarded based on how efficiently you solve the puzzle. Every level has a "Perfect Move Count" equivalent to the number of tiles. If you solve it within 1.5x of the perfect count, you'll earn 3 stars!</p>

                <h2>I lost my Cards Match progress!</h2>
                <p>Because we do not use accounts, your Cards Match progress is tied to the specific browser and device you played on. If you switched laptops, used a different browser, or cleared your cookies, your progress will reset.</p>
            </div>
        </div>
    </article>

    <style>
        .blog-body h2 { font-size: 1.4rem; color: var(--wood-dark); margin: 32px 0 12px 0; font-weight: 900; }
        .blog-body p { margin-bottom: 24px; color: var(--text-soft); }
    </style>
@endsection

