<?php

namespace App\Filament\Resources\Articles\Tables;

use App\Models\Article;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Article')
                    ->description(fn (Article $record): ?string => $record->subtitle ?: $record->excerpt)
                    ->searchable()
                    ->sortable()
                    ->limit(55)
                    ->wrap(),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        Article::STATUS_PUBLISHED => 'success',
                        Article::STATUS_REVIEW => 'warning',
                        Article::STATUS_SCHEDULED => 'info',
                        Article::STATUS_ARCHIVED => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('publish_readiness')
                    ->label('Readiness')
                    ->badge()
                    ->color(fn (Article $record): string => $record->publish_readiness_color)
                    ->sortable(false),

                TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->color('gray')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('content_format')
                    ->label('Format')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        Article::FORMAT_EXPLAINER => 'Explainer',
                        Article::FORMAT_MYTH_CHECK => 'Myth Check',
                        Article::FORMAT_RESEARCH_BREAKDOWN => 'Research Breakdown',
                        Article::FORMAT_PRACTICAL_TAKEAWAY => 'Practical Takeaway',
                        Article::FORMAT_EMERGING_THERAPY_EXPLAINED => 'Emerging Therapy',
                        Article::FORMAT_EVIDENCE_BRIEF => 'Evidence Brief',
                        default => $state ? str($state)->headline()->toString() : '—',
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        Article::FORMAT_EXPLAINER => 'info',
                        Article::FORMAT_MYTH_CHECK => 'warning',
                        Article::FORMAT_RESEARCH_BREAKDOWN => 'success',
                        Article::FORMAT_PRACTICAL_TAKEAWAY => 'gray',
                        Article::FORMAT_EMERGING_THERAPY_EXPLAINED => 'danger',
                        Article::FORMAT_EVIDENCE_BRIEF => 'primary',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('evidence_strength')
                    ->label('Evidence')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => $state ? str($state)->headline()->toString() : '—')
                    ->color(fn (?string $state): string => match ($state) {
                        'high' => 'success',
                        'moderate' => 'info',
                        'limited' => 'warning',
                        'early',
                        'very_early' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable(),

                // IconColumn::make('sources_checked')
                //     ->label('Sources')
                //     ->boolean()
                //     ->toggleable(isToggledHiddenByDefault: true),

                // IconColumn::make('limitations_stated')
                //     ->label('Limits')
                //     ->boolean()
                //     ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('reading_time')
                    ->label('Read')
                    ->suffix(' min')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('published_at')
                    ->label('Published')
                    ->dateTime('M j, Y')
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('M j, Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        Article::STATUS_DRAFT => 'Draft',
                        Article::STATUS_REVIEW => 'Review',
                        Article::STATUS_SCHEDULED => 'Scheduled',
                        Article::STATUS_PUBLISHED => 'Published',
                        Article::STATUS_ARCHIVED => 'Archived',
                    ]),

                SelectFilter::make('readiness')
                    ->label('Readiness')
                    ->options([
                        'ready' => 'Ready',
                        'needs_review' => 'Needs review',
                    ])
                    ->query(function ($query, array $data) {
                        if (($data['value'] ?? null) === 'ready') {
                            return $query
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
                                ->where('key_takeaway', '!=', '');
                        }

                        if (($data['value'] ?? null) === 'needs_review') {
                            return $query
                                ->where(function ($query) {
                                    $query
                                        ->where('has_medical_disclaimer', false)
                                        ->orWhere('sources_checked', false)
                                        ->orWhere('claims_checked', false)
                                        ->orWhere('limitations_stated', false)
                                        ->orWhereNull('body')
                                        ->orWhere('body', '')
                                        ->orWhereNull('excerpt')
                                        ->orWhere('excerpt', '')
                                        ->orWhereNull('quick_answer')
                                        ->orWhere('quick_answer', '')
                                        ->orWhereNull('what_the_science_says')
                                        ->orWhere('what_the_science_says', '')
                                        ->orWhereNull('limitations_summary')
                                        ->orWhere('limitations_summary', '')
                                        ->orWhereNull('real_life_meaning')
                                        ->orWhere('real_life_meaning', '')
                                        ->orWhereNull('key_takeaway')
                                        ->orWhere('key_takeaway', '');
                                });
                        }

                        return $query;
                    }),

                SelectFilter::make('content_format')
                    ->label('Format')
                    ->options([
                        Article::FORMAT_EXPLAINER => 'Explainer',
                        Article::FORMAT_MYTH_CHECK => 'Myth Check',
                        Article::FORMAT_RESEARCH_BREAKDOWN => 'Research Breakdown',
                        Article::FORMAT_PRACTICAL_TAKEAWAY => 'Practical Takeaway',
                        Article::FORMAT_EMERGING_THERAPY_EXPLAINED => 'Emerging Therapy Explained',
                        Article::FORMAT_EVIDENCE_BRIEF => 'Evidence Brief',
                    ]),

                SelectFilter::make('category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('author')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('evidence_strength')
                    ->label('Evidence')
                    ->options([
                        'high' => 'High',
                        'moderate' => 'Moderate',
                        'limited' => 'Limited',
                        'early' => 'Early',
                        'very_early' => 'Very Early',
                        'mixed' => 'Mixed',
                        'unclear' => 'Unclear',
                        'not_applicable' => 'Not Applicable',
                    ]),

                TernaryFilter::make('is_featured')
                    ->label('Featured'),

                TernaryFilter::make('sources_checked')
                    ->label('Sources checked'),

                TernaryFilter::make('limitations_stated')
                    ->label('Limitations stated'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('updated_at', 'desc');
    }
}