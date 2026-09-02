<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected ?string $heading = 'Content Overview';

    protected ?string $description = 'A quick editorial snapshot of Practical Health Science content.';

    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        $totalArticles = Article::query()->count();

        $publishedArticles = Article::query()
            ->where('status', Article::STATUS_PUBLISHED)
            ->count();

        $draftArticles = Article::query()
            ->where('status', Article::STATUS_DRAFT)
            ->count();

        $reviewArticles = Article::query()
            ->where('status', Article::STATUS_REVIEW)
            ->count();

        $scheduledArticles = Article::query()
            ->where('status', Article::STATUS_SCHEDULED)
            ->count();

        $readyArticles = Article::query()
            ->where('has_medical_disclaimer', true)
            ->where('sources_checked', true)
            ->where('claims_checked', true)
            ->where('limitations_stated', true)
            ->whereNotNull('body')
            ->where('body', '!=', '')
            ->whereNotNull('excerpt')
            ->where('excerpt', '!=', '')
            ->whereNotNull('quick_answer')
            ->where('quick_answer', '!=', '')
            ->whereNotNull('what_the_science_says')
            ->where('what_the_science_says', '!=', '')
            ->whereNotNull('limitations_summary')
            ->where('limitations_summary', '!=', '')
            ->whereNotNull('real_life_meaning')
            ->where('real_life_meaning', '!=', '')
            ->whereNotNull('key_takeaway')
            ->where('key_takeaway', '!=', '')
            ->count();

        $needsReviewArticles = max($totalArticles - $readyArticles, 0);

        return [
            Stat::make('Total Articles', $totalArticles)
                ->description($publishedArticles . ' published')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),

            Stat::make('Published', $publishedArticles)
                ->description('Live on the public site')
                ->descriptionIcon('heroicon-m-globe-alt')
                ->color('success'),

            Stat::make('Draft / Review', $draftArticles + $reviewArticles)
                ->description($draftArticles . ' draft, ' . $reviewArticles . ' review')
                ->descriptionIcon('heroicon-m-pencil-square')
                ->color(($draftArticles + $reviewArticles) > 0 ? 'warning' : 'gray'),

            Stat::make('Scheduled', $scheduledArticles)
                ->description('Future publishing queue')
                ->descriptionIcon('heroicon-m-clock')
                ->color($scheduledArticles > 0 ? 'info' : 'gray'),

            Stat::make('Categories', Category::query()->count())
                ->description(Category::query()->where('is_active', true)->count() . ' active')
                ->descriptionIcon('heroicon-m-folder')
                ->color('gray'),

            Stat::make('Tags', Tag::query()->count())
                ->description('Public topics and internal tagging')
                ->descriptionIcon('heroicon-m-tag')
                ->color('gray'),

            Stat::make('Sources', Source::query()->count())
                ->description('Scientific references in database')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('gray'),

            Stat::make('Ready Articles', $readyArticles)
                ->description($needsReviewArticles . ' need editorial completion')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color($needsReviewArticles === 0 ? 'success' : 'warning'),
        ];
    }
}