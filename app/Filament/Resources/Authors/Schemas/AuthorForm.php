<?php

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name'),
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('title'),
                Textarea::make('bio')
                    ->columnSpanFull(),
                TextInput::make('avatar_path'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('website_url')
                    ->url(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
