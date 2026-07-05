<?php

namespace App\Filament\Resources\Articles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
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
                    ->searchable()
                    ->sortable()
                    ->limit(60)
                    ->description(fn ($record): ?string => $record->subtitle),

                TextColumn::make('category.name')
                    ->label('Category')
                    ->badge()
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('author.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('content_format')
                    ->label('Format')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'explainer' => 'Explainer',
                        'myth_check' => 'Myth Check',
                        'research_breakdown' => 'Research Breakdown',
                        'practical_takeaway' => 'Practical Takeaway',
                        'emerging_therapy_explained' => 'Emerging Therapy',
                        'evidence_brief' => 'Evidence Brief',
                        default => 'Not specified',
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        'explainer' => 'info',
                        'myth_check' => 'warning',
                        'research_breakdown' => 'success',
                        'practical_takeaway' => 'gray',
                        'emerging_therapy_explained' => 'danger',
                        'evidence_brief' => 'info',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'draft' => 'Draft',
                        'review' => 'Review',
                        'scheduled' => 'Scheduled',
                        'published' => 'Published',
                        'archived' => 'Archived',
                        default => 'Unknown',
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        'draft' => 'gray',
                        'review' => 'warning',
                        'scheduled' => 'info',
                        'published' => 'success',
                        'archived' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('evidence_strength')
                    ->label('Evidence')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'high' => 'High',
                        'moderate' => 'Moderate',
                        'limited' => 'Limited',
                        'early' => 'Early',
                        'very_early' => 'Very early',
                        'mixed' => 'Mixed',
                        'unclear' => 'Unclear',
                        default => 'Not specified',
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        'high' => 'success',
                        'moderate' => 'info',
                        'limited' => 'warning',
                        'early' => 'warning',
                        'very_early' => 'danger',
                        'mixed' => 'gray',
                        'unclear' => 'gray',
                        default => 'gray',
                    })
                    ->sortable()
                    ->toggleable(),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),

                IconColumn::make('sources_checked')
                    ->label('Sources')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),

                IconColumn::make('limitations_stated')
                    ->label('Limits')
                    ->boolean()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('reading_time')
                    ->label('Read')
                    ->suffix(' min')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('published_at')
                    ->label('Published')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'review' => 'Review',
                        'scheduled' => 'Scheduled',
                        'published' => 'Published',
                        'archived' => 'Archived',
                    ]),

                SelectFilter::make('content_format')
                    ->label('Format')
                    ->options([
                        'explainer' => 'Explainer',
                        'myth_check' => 'Myth Check',
                        'research_breakdown' => 'Research Breakdown',
                        'practical_takeaway' => 'Practical Takeaway',
                        'emerging_therapy_explained' => 'Emerging Therapy Explained',
                        'evidence_brief' => 'Evidence Brief',
                    ]),

                SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('author_id')
                    ->label('Author')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload(),

                SelectFilter::make('evidence_strength')
                    ->label('Evidence')
                    ->options([
                        'high' => 'High',
                        'moderate' => 'Moderate',
                        'limited' => 'Limited',
                        'early' => 'Early / preliminary',
                        'very_early' => 'Very early / preclinical',
                        'mixed' => 'Mixed',
                        'unclear' => 'Unclear',
                    ]),

                TernaryFilter::make('is_featured')
                    ->label('Featured'),

                TernaryFilter::make('sources_checked')
                    ->label('Sources checked'),

                TernaryFilter::make('limitations_stated')
                    ->label('Limitations stated'),
            ])
            ->defaultSort('updated_at', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }
}