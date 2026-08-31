<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\View\View;

class LatestController extends Controller
{
    public function __invoke(): View
    {
        $articles = Article::query()
            ->published()
            ->with(['category', 'author', 'tags'])
            ->latest('published_at')
            ->paginate(12);

        return view('site.latest.index', [
            'articles' => $articles,
        ]);
    }
}