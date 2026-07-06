<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $staticUrls = [
            [
                'loc' => route('home'),
                'lastmod' => now(),
                'changefreq' => 'daily',
                'priority' => '1.0',
            ],
            [
                'loc' => route('categories.index'),
                'lastmod' => now(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('search'),
                'lastmod' => now(),
                'changefreq' => 'weekly',
                'priority' => '0.4',
            ],
            [
                'loc' => route('pages.about'),
                'lastmod' => now(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ],
            [
                'loc' => route('pages.editorial-policy'),
                'lastmod' => now(),
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ],
            [
                'loc' => route('pages.medical-disclaimer'),
                'lastmod' => now(),
                'changefreq' => 'monthly',
                'priority' => '0.5',
            ],
            [
                'loc' => route('pages.contact'),
                'lastmod' => now(),
                'changefreq' => 'monthly',
                'priority' => '0.4',
            ],
        ];

        $categories = Category::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $tags = Tag::query()
            ->whereHas('articles', fn($query) => $query->published())
            ->orderBy('name')
            ->get();

        $articles = Article::query()
            ->published()
            ->where('noindex', false)
            ->latest('published_at')
            ->get();

        return response()
            ->view('site.sitemap', [
                'staticUrls' => $staticUrls,
                'categories' => $categories,
                'tags' => $tags,
                'articles' => $articles,
            ])
            ->header('Content-Type', 'application/xml');
    }
}
