<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function __invoke(Request $request): View
    {
        $search = trim((string) $request->query('q', ''));

        $articles = Article::query()
            ->published()
            ->with(['category', 'author', 'tags'])
            ->when(strlen($search) >= 2, function ($query) use ($search) {
                $like = '%' . addcslashes($search, '%_') . '%';

                $query->where(function ($query) use ($like) {
                    $query
                        ->where('title', 'like', $like)
                        ->orWhere('subtitle', 'like', $like)
                        ->orWhere('excerpt', 'like', $like)
                        ->orWhere('quick_answer', 'like', $like)
                        ->orWhere('body', 'like', $like)
                        ->orWhereHas('category', function ($query) use ($like) {
                            $query->where('name', 'like', $like);
                        })
                        ->orWhereHas('tags', function ($query) use ($like) {
                            $query->where('name', 'like', $like);
                        });
                });
            })
            ->when(strlen($search) < 2, function ($query) {
                $query->whereRaw('1 = 0');
            })
            ->latest('published_at')
            ->paginate(12)
            ->withQueryString();

        return view('site.search.index', [
            'search' => $search,
            'articles' => $articles,
        ]);
    }
}