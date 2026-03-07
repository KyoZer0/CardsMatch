@extends('layouts.app')

@section('title', 'Parents Guide – Cards Match | CardsMatch')
@section('meta_description', 'A guide for parents highlighting the child-safe, microtransaction-free, and educational nature of our Cards Match game. CardsMatch is safe for all ages.')

@section('hero')
    <article class="rebrand-content" style="max-width: 850px; text-align: left;">
        <div style="text-align: center; margin-bottom: 40px;">
            <div class="hero-kicker" style="margin: 0 auto 16px;">
                <span>INFO</span>
                <span>Safe for kids</span>
            </div>
            <h1 class="rebrand-title" style="margin-bottom: 16px;">
                Parents Guide
            </h1>
            <p class="rebrand-desc">A safe, cozy space for all ages.</p>
        </div>
    </article>
@endsection

@section('content')
    <article class="rebrand-content" style="max-width: 850px; text-align: left; margin-top: 0;">
        <div class="review-card" style="box-shadow: 8px 8px 0 var(--wood-light); padding: 40px 48px; margin-bottom: 48px;">
            <div class="blog-body" style="font-size: 1.05rem; color: var(--text-main); line-height: 1.8; font-weight: 600;">
                <h2>Educational and Relaxing Cards Match</h2>
                <p>Our Cards Match game helps children develop spatial awareness, pattern recognition, and patience in a completely stress-free environment. There are no timers counting down or buzzing alarms.</p>
                
                <h2>Zero Microtransactions</h2>
                <p>We believe games should just be games. There is absolutely nothing to buy in this Cards Match game. No hidden gems, no premium energy refills, and no surprise credit card bills. Every single Cards Match level is unlocked purely by playing.</p>
                
                <h2>No Chat or Social Features</h2>
                <p>Your child's safety is paramount. CardsMatch is a single-player Cards Match experience with zero multi-player chat functionality, social media integrations, or messaging systems. They play entirely in their own world.</p>

                <h2>Ad-Free Experience</h2>
                <p>We do not interrupt gameplay with video advertisements or banner ads. The focus is entirely on the beautiful puzzle at hand.</p>
            </div>
        </div>
    </article>

    <style>
        .blog-body h2 { font-size: 1.6rem; color: var(--wood-dark); margin: 32px 0 16px 0; font-weight: 900; }
        .blog-body p { margin-bottom: 24px; }
    </style>
@endsection

