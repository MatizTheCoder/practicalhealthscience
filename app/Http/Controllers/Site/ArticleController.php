<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function show(Article $article): View
    {
        abort_unless(
            $article->status === Article::STATUS_PUBLISHED
            && $article->published_at
            && $article->published_at->lte(now()),
            404
        );

        $article->load([
            'category',
            'author',
            'tags',
            'series',
            'sources',
            'relatedArticles.category',
        ]);

        $relatedArticles = $article->relatedArticles
            ->filter(fn (Article $relatedArticle) => (
                $relatedArticle->status === Article::STATUS_PUBLISHED
                && $relatedArticle->published_at
                && $relatedArticle->published_at->lte(now())
            ))
            ->take(3);

        $moreFromCategory = collect();

        if ($article->category) {
            $moreFromCategory = Article::query()
                ->published()
                ->whereBelongsTo($article->category)
                ->whereKeyNot($article->id)
                ->with(['category', 'author', 'tags'])
                ->latest('published_at')
                ->take(3)
                ->get();
        }

        $latestArticles = Article::query()
            ->published()
            ->whereKeyNot($article->id)
            ->with(['category', 'author', 'tags'])
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('site.articles.show', [
            'article' => $article,
            'relatedArticles' => $relatedArticles,
            'moreFromCategory' => $moreFromCategory,
            'latestArticles' => $latestArticles,
        ]);
    }
}