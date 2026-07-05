<?php

namespace App\Filament\Resources\Sources\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SourcesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->limit(60),

                TextColumn::make('journal')
                    ->label('Journal')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('year')
                    ->label('Year')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state ? (string) $state : null),

                TextColumn::make('doi')
                    ->label('DOI')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('pmid')
                    ->label('PMID')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('source_type')
                    ->label('Source Type')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'meta_analysis' => 'Meta-analysis',
                        'systematic_review' => 'Systematic review',
                        'randomized_controlled_trial' => 'Randomized controlled trial',
                        'clinical_trial' => 'Clinical trial',
                        'observational_study' => 'Observational study',
                        'case_report' => 'Case report',
                        'animal_study' => 'Animal study',
                        'cell_study' => 'Cell study',
                        'mechanistic_study' => 'Mechanistic study',
                        'clinical_guideline' => 'Clinical guideline',
                        'regulatory_document' => 'Regulatory document',
                        'expert_review' => 'Expert review',
                        'other' => 'Other',
                        default => 'Not specified',
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        'meta_analysis',
                        'systematic_review',
                        'randomized_controlled_trial',
                        'clinical_trial',
                        'clinical_guideline' => 'success',

                        'observational_study',
                        'expert_review',
                        'regulatory_document' => 'info',

                        'animal_study',
                        'cell_study',
                        'mechanistic_study' => 'warning',

                        'case_report',
                        'other',
                        null => 'gray',

                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('evidence_level')
                    ->label('Evidence')
                    ->badge()
                    ->formatStateUsing(fn (?string $state): string => match ($state) {
                        'high' => 'High',
                        'moderate' => 'Moderate',
                        'limited' => 'Limited',
                        'early' => 'Early',
                        'very_early' => 'Very early',
                        'not_applicable' => 'N/A',
                        default => 'Not specified',
                    })
                    ->color(fn (?string $state): string => match ($state) {
                        'high' => 'success',
                        'moderate' => 'info',
                        'limited' => 'warning',
                        'early' => 'warning',
                        'very_early' => 'danger',
                        'not_applicable' => 'gray',
                        null => 'gray',
                        default => 'gray',
                    })
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}