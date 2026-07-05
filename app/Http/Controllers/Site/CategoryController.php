<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(Category $category): View
    {
        abort_unless($category->is_active, 404);

        $articles = Article::query()
            ->published()
            ->whereBelongsTo($category)
            ->with(['category', 'author', 'tags'])
            ->latest('published_at')
            ->paginate(12);

        return view('site.categories.show', [
            'category' => $category,
            'articles' => $articles,
        ]);
    }
}