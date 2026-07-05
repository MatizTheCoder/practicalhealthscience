<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $featuredArticle = Article::query()
            ->published()
            ->featured()
            ->with(['category', 'author', 'tags'])
            ->latest('published_at')
            ->first();

        $latestArticles = Article::query()
            ->published()
            ->with(['category', 'author', 'tags'])
            ->when($featuredArticle, fn ($query) => $query->whereKeyNot($featuredArticle->id))
            ->latest('published_at')
            ->take(9)
            ->get();

        $categories = Category::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('site.home', [
            'featuredArticle' => $featuredArticle,
            'latestArticles' => $latestArticles,
            'categories' => $categories,
        ]);
    }
}