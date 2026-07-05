<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Category details')
                    ->description('Main editorial category used to organize Practical Health Science content.')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('slug')
                            ->maxLength(255)
                            ->helperText('Leave empty to generate automatically from the category name.'),

                        Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull(),

                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),

                        Toggle::make('is_active')
                            ->default(true),
                    ])
                    ->columns(2),

                Section::make('SEO')
                    ->schema([
                        TextInput::make('seo_title')
                            ->maxLength(255),

                        Textarea::make('meta_description')
                            ->rows(3)
                            ->maxLength(160)
                            ->helperText('Aim for 120–160 characters.')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}