<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ArticleController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\TagController;
use App\Http\Controllers\Site\SearchController;
use App\Http\Controllers\Site\PageController;
use App\Http\Controllers\Site\SitemapController;
use App\Http\Controllers\Site\LatestController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeController::class)->name('home');

Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])
    ->name('articles.show');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])
    ->name('categories.show');

Route::get('/topics', [TagController::class, 'index'])
    ->name('tags.index');

Route::get('/tags/{tag:slug}', [TagController::class, 'show'])
    ->name('tags.show');

Route::get('/tags/{tag:slug}', [TagController::class, 'show'])
    ->name('tags.show');

Route::get('/sitemap.xml', SitemapController::class)
    ->name('sitemap');

Route::get('/search', SearchController::class)
    ->name('search');

Route::get('/about', [PageController::class, 'about'])
    ->name('pages.about');

Route::get('/latest', LatestController::class)
    ->name('latest.index');

Route::get('/editorial-policy', [PageController::class, 'editorialPolicy'])
    ->name('pages.editorial-policy');
    
Route::get('/editorial-team', [PageController::class, 'editorialTeam'])
    ->name('pages.editorial-team');

Route::get('/medical-disclaimer', [PageController::class, 'medicalDisclaimer'])
    ->name('pages.medical-disclaimer');

Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])
    ->name('pages.privacy-policy');

Route::get('/terms-of-use', [PageController::class, 'termsOfUse'])
    ->name('pages.terms-of-use');

Route::get('/newsletter', [PageController::class, 'newsletter'])
    ->name('pages.newsletter');

Route::get('/contact', [PageController::class, 'contact'])
    ->name('pages.contact');
