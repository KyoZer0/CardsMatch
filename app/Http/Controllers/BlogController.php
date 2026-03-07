<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Simple in-memory blog data for SEO content.
     *
     * In a real app you would swap this for a database or CMS.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function posts(): array
    {
        $path = database_path('blogs.json');
        if (!file_exists($path)) {
            return [];
        }
        return json_decode(file_get_contents($path), true) ?? [];
    }

    protected function findBySlug(string $slug): ?array
    {
        foreach ($this->posts() as $post) {
            if ($post['slug'] === $slug) {
                return $post;
            }
        }

        return null;
    }

    public function index(): View
    {
        $posts = $this->posts();

        return view('blogs.index', [
            'posts' => $posts,
        ]);
    }

    public function show(string $slug): View
    {
        $post = $this->findBySlug($slug);

        abort_if(is_null($post), 404);

        return view('blogs.show', [
            'post' => $post,
        ]);
    }
}

