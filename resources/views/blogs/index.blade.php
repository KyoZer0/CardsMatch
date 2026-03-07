@extends('layouts.app')

@section('title', 'CardsMatch Blog – Cards Match Tips & Updates')
@section('meta_description', 'Read short, focused articles about Cards Match strategy, cozy puzzle design, and updates to the CardsMatch Cards Match game.')

@section('hero')
    <section class="rebrand-content">
        <div class="hero-kicker" style="margin: 0 auto 16px;">
            <span>BLOG</span>
            <span>Puzzle tips &amp; updates</span>
        </div>
        <h1 class="rebrand-title">Cards Match Blog</h1>
        <p class="rebrand-desc">
            Browse friendly articles about Cards Match strategy, UI design choices, and how to get the most out of your CardsMatch Cards Match sessions.
        </p>
        <div style="margin-bottom: 48px;">
            <a class="bouncy-btn" href="{{ route('game') }}">Play CardsMatch</a>
            <a class="nav-link" href="{{ route('home') }}" style="margin-left:16px;">Back to overview</a>
        </div>
    </section>
@endsection

@section('content')
    <section class="rebrand-reviews" style="max-width: 1000px; text-align: left; margin-top: 0;">
        <h2 class="rebrand-section-heading" style="text-align: center;">Latest Posts</h2>
        
        <div class="reviews-grid">
            @foreach ($posts as $post)
            <div class="review-card" style="display: flex; flex-direction: column;">
                <h3 style="font-size: 1.35rem; margin-bottom: 12px; color: var(--wood-dark); font-weight: 900;">
                    <a href="{{ route('blogs.show', $post['slug']) }}" style="text-decoration: none; color: inherit;">
                        {{ $post['title'] }}
                    </a>
                </h3>
                <p style="font-size: 1rem; color: var(--text-soft); line-height: 1.6; margin-bottom: 24px; flex: 1;">
                    {{ $post['excerpt'] }}
                </p>
                <div style="font-size: 0.85rem; font-weight: 900; color: var(--wood-dark); border-top: 3px dashed var(--wood-light); padding-top: 16px;">
                    <span>📅 {{ \Illuminate\Support\Carbon::parse($post['published_at'])->toFormattedDateString() }}</span>
                    <span style="margin-left: 16px;">⏱ {{ $post['reading_time'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection

