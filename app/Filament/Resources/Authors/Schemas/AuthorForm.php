<?php

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Author profile')
                    ->description('Author information shown on public articles.')
                    ->schema([
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText('Optional. Link this author profile to a registered admin user.'),

                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('slug')
                            ->maxLength(255)
                            ->helperText('Leave empty to generate automatically from the author name.'),

                        TextInput::make('title')
                            ->maxLength(255)
                            ->placeholder('Example: Exercise Physiology & Health Science Editor'),

                        TextInput::make('email')
                            ->email()
                            ->maxLength(255),

                        TextInput::make('website_url')
                            ->url()
                            ->maxLength(255),

                        TextInput::make('avatar_path')
                            ->maxLength(255)
                            ->helperText('For now, you can leave this empty. We will add a proper media upload system later.'),

                        Toggle::make('is_active')
                            ->default(true),

                        Textarea::make('bio')
                            ->rows(5)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}