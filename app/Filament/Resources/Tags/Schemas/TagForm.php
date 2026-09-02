<?php

namespace App\Filament\Resources\Tags\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Tag details')
    ->schema([
        TextInput::make('name')
            ->label('Name')
            ->required()
            ->maxLength(255)
            ->unique(ignoreRecord: true)
            ->helperText('Tag names must be unique. Reuse an existing tag instead of creating duplicates.'),

        TextInput::make('slug')
            ->label('Slug')
            ->maxLength(255)
            ->unique(ignoreRecord: true)
            ->helperText('Leave empty to generate automatically, or use a unique slug.'),

        Textarea::make('description')
            ->label('Description')
            ->rows(4)
            ->columnSpanFull(),
    ])
    ->columns(2),]);
    }
}