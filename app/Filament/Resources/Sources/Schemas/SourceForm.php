<?php

namespace App\Filament\Resources\Sources\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SourceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('authors')
                    ->columnSpanFull(),
                TextInput::make('journal'),
                TextInput::make('year')
                    ->numeric(),
                TextInput::make('doi'),
                TextInput::make('pmid'),
                Textarea::make('url')
                    ->columnSpanFull(),
                TextInput::make('source_type'),
                TextInput::make('evidence_level'),
                Textarea::make('note')
                    ->columnSpanFull(),
            ]);
    }
}
