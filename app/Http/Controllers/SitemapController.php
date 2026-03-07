<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $base = config('app.url') ?: URL::to('/');

        // Static top-level URLs
        $urls = [
            [
                'loc' => URL::to('/'),
                'changefreq' => 'weekly',
                'priority' => '1.0',
            ],
            [
                'loc' => URL::to('/play'),
                'changefreq' => 'daily',
                'priority' => '0.9',
            ],
            [
                'loc' => URL::to('/blogs'),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => URL::to('/about'),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ],
            [
                'loc' => URL::to('/faq'),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ],
            [
                'loc' => URL::to('/contact-us'),
                'changefreq' => 'monthly',
                'priority' => '0.5',
            ],
            [
                'loc' => URL::to('/parents-guide'),
                'changefreq' => 'monthly',
                'priority' => '0.5',
            ],
            [
                'loc' => URL::to('/privacy-policy'),
                'changefreq' => 'yearly',
                'priority' => '0.4',
            ],
            [
                'loc' => URL::to('/terms'),
                'changefreq' => 'yearly',
                'priority' => '0.4',
            ],
        ];

        // Blog post URLs
        $blogPosts = [];
        $blogPath = database_path('blogs.json');

        if (File::exists($blogPath)) {
            $posts = json_decode(File::get($blogPath), true) ?? [];
            $blogPosts = array_values(array_filter(array_map(
                static fn ($post) => $post['slug'] ?? null,
                $posts
            )));
        }

        foreach ($blogPosts as $slug) {
            $urls[] = [
                'loc' => URL::to("/blogs/{$slug}"),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ];
        }

        $xml = view('sitemap.xml', [
            'base' => $base,
            'urls' => $urls,
        ])->render();

        return response($xml, 200)->header('Content-Type', 'application/xml; charset=utf-8');
    }
}
