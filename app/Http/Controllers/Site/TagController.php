<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\View\View;

class TagController extends Controller
{
    public function show(Tag $tag): View
    {
        $articles = Article::query()
            ->published()
            ->whereHas('tags', fn ($query) => $query->whereKey($tag->id))
            ->with(['category', 'author', 'tags'])
            ->latest('published_at')
            ->paginate(12);

        return view('site.tags.show', [
            'tag' => $tag,
            'articles' => $articles,
        ]);
    }
}