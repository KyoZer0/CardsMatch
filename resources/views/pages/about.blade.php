@extends('layouts.app')

@section('title', 'About Us – Cards Match | CardsMatch')
@section('meta_description', 'Learn about the story behind CardsMatch and our mission to create a cozy, free Cards Match game. Discover why our Cards Match stands out from the rest.')

@section('hero')
    <article class="rebrand-content" style="max-width: 850px; text-align: left;">
        <div style="text-align: center; margin-bottom: 40px;">
            <div class="hero-kicker" style="margin: 0 auto 16px;">
                <span>INFO</span>
                <span>Our Story</span>
            </div>
            <h1 class="rebrand-title" style="margin-bottom: 16px;">
                About CardsMatch
            </h1>
            <p class="rebrand-desc">Building a cozier corner of the internet.</p>
        </div>
    </article>
@endsection

@section('content')
    <article class="rebrand-content" style="max-width: 850px; text-align: left; margin-top: 0;">
        <div class="review-card" style="box-shadow: 8px 8px 0 var(--wood-light); padding: 40px 48px; margin-bottom: 48px;">
            <div class="blog-body" style="font-size: 1.05rem; color: var(--text-main); line-height: 1.8; font-weight: 600;">
                <p>CardsMatch was born out of a simple desire: we wanted a Cards Match game that didn't feel stressful. The internet is already loud enough, and most mobile Cards Match games today rely on flashing lights, aggressive monetization, and high-pressure timers.</p>
                
                <p>We believe games should respect your time and provide genuine relaxation.</p>
                
                <p>That's why our Cards Match features a grounded, "woodland" aesthetic with warm creams, deep browns, and satisfying, chunky tactile interactions. When two Cards Match pieces snap together, it feels good. There's no timer rushing you. There's no energy meter telling you to stop.</p>
                
                <p>As a small independent team, we handpick high-quality Cards Match packs ranging from stunning nature photography to cute animals. We plan to keep updating CardsMatch with new Cards Match content continuously.</p>

                <p>Thank you for playing, and we hope you find some peace and quiet here.</p>
            </div>
        </div>
    </article>

    <style>
        .blog-body p { margin-bottom: 24px; color: var(--text-soft); }
    </style>
@endsection

