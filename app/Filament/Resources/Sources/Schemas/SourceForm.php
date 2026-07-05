<?php

namespace App\Filament\Resources\Sources\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class SourceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Source details')
                    ->description('Scientific or authoritative source used to support Practical Health Science articles.')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('authors')
                            ->rows(3)
                            ->helperText('Use a readable format. Example: Smith J, Brown K, Patel R.')
                            ->columnSpanFull(),

                        TextInput::make('journal')
                            ->maxLength(255),

                        TextInput::make('year')
                            ->numeric()
                            ->minValue(1900)
                            ->maxValue((int) date('Y') + 1),

                        TextInput::make('doi')
                            ->maxLength(255)
                            ->placeholder('Example: 10.1000/example'),

                        TextInput::make('pmid')
                            ->maxLength(255)
                            ->placeholder('PubMed ID, if available'),

                        TextInput::make('url')
                            ->url()
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Evidence classification')
                    ->description('Used internally to help judge how strong or preliminary the evidence is.')
                    ->schema([
                        Select::make('source_type')
                            ->options([
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
                            ])
                            ->searchable()
                            ->native(false),

                        Select::make('evidence_level')
                            ->options([
                                'high' => 'High',
                                'moderate' => 'Moderate',
                                'limited' => 'Limited',
                                'early' => 'Early / preliminary',
                                'very_early' => 'Very early / preclinical',
                                'not_applicable' => 'Not applicable',
                            ])
                            ->native(false),

                        Textarea::make('note')
                            ->rows(4)
                            ->helperText('Short internal note about why this source matters or how it should be interpreted.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}