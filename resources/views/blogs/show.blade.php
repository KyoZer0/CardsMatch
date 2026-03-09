@extends('layouts.app')

@section('title', $post['title'])
@section('meta_description', $post['excerpt'])

@section('hero')
    <article class="rebrand-content" style="max-width: 850px; text-align: left;">
        <div style="text-align: center; margin-bottom: 40px;">
            <div class="hero-kicker" style="margin: 0 auto 16px;">
                <span>BLOG POST</span>
                <span>Cards Match insights</span>
            </div>
            <h1 class="rebrand-title" style="margin-bottom: 16px;">
                {{ $post['title'] }}
            </h1>
            <div style="font-size: 0.95rem; font-weight: 900; color: var(--wood-dark); display: flex; justify-content: center; flex-wrap: wrap; gap: 16px;">
                @if(isset($post['author']))
                    <span style="background: var(--bg-card-inner); padding: 4px 12px; border-radius: 999px; border: 2px solid var(--wood-dark);">
                        {{ $post['author_image'] ?? '👤' }} {{ $post['author'] }}
                    </span>
                @endif
                <span style="background: var(--bg-card-inner); padding: 4px 12px; border-radius: 999px; border: 2px solid var(--wood-dark);">
                    📅 {{ \Illuminate\Support\Carbon::parse($post['published_at'])->toFormattedDateString() }}
                </span>
                <span style="background: var(--accent-yellow); padding: 4px 12px; border-radius: 999px; border: 2px solid var(--wood-dark);">
                    ⏱ {{ $post['reading_time'] }}
                </span>
            </div>
        </div>
    </article>
@endsection

@section('content')
    <article class="rebrand-content" style="max-width: 850px; text-align: left; margin-top: 0;">
        <div class="review-card" style="box-shadow: 8px 8px 0 var(--wood-light); padding: 40px 48px; margin-bottom: 48px;">
            <div class="blog-body" style="font-size: 1.05rem; color: var(--text-main); line-height: 1.8; font-weight: 600;">
                {!! $post['body'] !!}
            </div>
            
            @if(isset($post['author_bio']))
            <div style="margin-top: 48px; padding-top: 32px; border-top: 4px solid var(--wood-light); display: flex; gap: 24px; align-items: flex-start;">
                <div style="font-size: 3rem; background: var(--wood-light); border: 3px solid var(--wood-dark); border-radius: 50%; width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                    {{ $post['author_image'] ?? '👤' }}
                </div>
                <div>
                    <h3 style="margin: 0 0 8px 0; font-size: 1.25rem; color: var(--wood-dark); font-weight: 900;">About {{ $post['author'] ?? 'the Author' }}</h3>
                    <p style="margin: 0; font-size: 0.95rem; color: var(--text-soft); line-height: 1.6;">
                        {{ $post['author_bio'] }}
                    </p>
                </div>
            </div>
            @endif
        </div>

        <div style="text-align: center; margin-top: 24px;">
            <a class="nav-link" href="{{ route('blogs.index') }}" style="margin-right: 16px;">Back to all posts</a>
            <a class="bouncy-btn" href="{{ route('game') }}">Play Cards Match</a>
        </div>
    </article>

    <style>
        .blog-body h2 {
            font-size: 1.6rem;
            color: var(--wood-dark);
            margin: 32px 0 16px 0;
            font-weight: 900;
        }
        .blog-body h3 {
            font-size: 1.3rem;
            color: var(--wood-dark);
            margin: 24px 0 12px 0;
            font-weight: 800;
        }
        .blog-body p {
            margin-bottom: 24px;
        }
        .blog-body ul, .blog-body ol {
            margin-bottom: 24px;
            padding-left: 24px;
        }
        .blog-body li {
            margin-bottom: 8px;
        }
        .blog-body a {
            color: var(--wood-dark);
            text-decoration: underline;
            font-weight: 800;
        }
    </style>
@endsection

