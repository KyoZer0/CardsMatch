@extends('layouts.app')

@section('title', 'Contact Us – Cards Match | CardsMatch')
@section('meta_description', 'Get in touch with the CardsMatch Cards Match game development team for support, feedback, or business inquiries.')

@section('hero')
    <article class="rebrand-content" style="max-width: 850px; text-align: left;">
        <div style="text-align: center; margin-bottom: 40px;">
            <div class="hero-kicker" style="margin: 0 auto 16px;">
                <span>INFO</span>
                <span>Get in touch</span>
            </div>
            <h1 class="rebrand-title" style="margin-bottom: 16px;">
                Contact Us
            </h1>
            <p class="rebrand-desc">We'd love to hear from you.</p>
        </div>
    </article>
@endsection

@section('content')
    <article class="rebrand-content" style="max-width: 850px; text-align: left; margin-top: 0;">
        <div class="review-card" style="box-shadow: 8px 8px 0 var(--wood-light); padding: 40px 48px; margin-bottom: 48px;">
            <div class="blog-body" style="font-size: 1.05rem; color: var(--text-main); line-height: 1.8; font-weight: 600;">
                <h2>Support & Feedback</h2>
                <p>Having trouble with a Cards Match level? Found a bug? Or just want to suggest a new Cards Match picture pack category? Drop us a line.</p>
                <p>Email: <strong>support@CardsMatch.game</strong></p>
                
                <h2>Business Inquiries</h2>
                <p>For press, partnerships, or licensing inquiries, please reach out to our business team.</p>
                <p>Email: <strong>hello@CardsMatch.game</strong></p>
                
                <h2>Social Media</h2>
                <p>Follow along with our updates and new puzzle pack releases:</p>
                <ul>
                    <li>Twitter: <strong>@PlayCardsMatch</strong></li>
                    <li>Instagram: <strong>@CardsMatchGame</strong></li>
                </ul>
            </div>
        </div>
    </article>

    <style>
        .blog-body h2 { font-size: 1.6rem; color: var(--wood-dark); margin: 32px 0 16px 0; font-weight: 900; }
        .blog-body p { margin-bottom: 24px; }
        .blog-body ul { padding-left: 20px; }
    </style>
@endsection

