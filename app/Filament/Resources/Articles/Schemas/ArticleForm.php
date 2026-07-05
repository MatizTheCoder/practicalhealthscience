<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Article editor')
                    ->tabs([
                        Tab::make('Basics')
                            ->schema([
                                Section::make('Article basics')
                                    ->description('Core article information shown to readers and used for editorial organization.')
                                    ->schema([
                                        TextInput::make('title')
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpanFull(),

                                        TextInput::make('slug')
                                            ->maxLength(255)
                                            ->helperText('Leave empty to generate automatically from the title.'),

                                        TextInput::make('subtitle')
                                            ->label('Subtitle / Deck')
                                            ->maxLength(255),

                                        Textarea::make('excerpt')
                                            ->rows(3)
                                            ->helperText('Short summary used on cards, category pages, and search results.')
                                            ->columnSpanFull(),

                                        Select::make('category_id')
                                            ->label('Category')
                                            ->relationship('category', 'name')
                                            ->searchable()
                                            ->preload(),

                                        Select::make('author_id')
                                            ->label('Author')
                                            ->relationship('author', 'name')
                                            ->searchable()
                                            ->preload(),

                                        Select::make('content_format')
                                            ->label('Content Format')
                                            ->options([
                                                'explainer' => 'Explainer',
                                                'myth_check' => 'Myth Check',
                                                'research_breakdown' => 'Research Breakdown',
                                                'practical_takeaway' => 'Practical Takeaway',
                                                'emerging_therapy_explained' => 'Emerging Therapy Explained',
                                                'evidence_brief' => 'Evidence Brief',
                                            ])
                                            ->searchable()
                                            ->native(false),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Content')
                            ->schema([
                                Section::make('Main content')
                                    ->description('The reader-friendly article body. Keep the style clear, cautious, practical, and evidence-based.')
                                    ->schema([
                                        RichEditor::make('body')
                                            ->label('Article Body')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Tab::make('Editorial Framework')
                            ->schema([
                                Section::make('Editorial framework')
                                    ->description('These fields make the article consistent with the Practical Health Science promise.')
                                    ->schema([
                                        Textarea::make('quick_answer')
                                            ->label('Quick Answer')
                                            ->rows(3)
                                            ->helperText('A concise answer to the reader’s likely question.')
                                            ->columnSpanFull(),

                                        Textarea::make('what_the_science_says')
                                            ->label('What the Science Says')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        Select::make('evidence_strength')
                                            ->label('Evidence Strength')
                                            ->options([
                                                'high' => 'High',
                                                'moderate' => 'Moderate',
                                                'limited' => 'Limited',
                                                'early' => 'Early / preliminary',
                                                'very_early' => 'Very early / preclinical',
                                                'mixed' => 'Mixed',
                                                'unclear' => 'Unclear',
                                            ])
                                            ->native(false),

                                        Textarea::make('limitations_summary')
                                            ->label('Important Limitations')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        Textarea::make('real_life_meaning')
                                            ->label('What This Means in Real Life')
                                            ->rows(4)
                                            ->columnSpanFull(),

                                        Textarea::make('key_takeaway')
                                            ->label('Key Takeaway')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Organization')
                            ->schema([
                                Section::make('Organization')
                                    ->description('Tags, series, sources, and related reading structure.')
                                    ->schema([
                                        Select::make('tags')
                                            ->relationship('tags', 'name')
                                            ->multiple()
                                            ->searchable()
                                            ->preload(),

                                        Select::make('series')
                                            ->relationship('series', 'title')
                                            ->multiple()
                                            ->searchable()
                                            ->preload(),

                                        Select::make('sources')
                                            ->relationship('sources', 'title')
                                            ->multiple()
                                            ->searchable()
                                            ->preload()
                                            ->helperText('Attach scientific or authoritative sources used in this article.'),

                                        Select::make('relatedArticles')
                                            ->label('Related Articles')
                                            ->relationship('relatedArticles', 'title')
                                            ->multiple()
                                            ->searchable()
                                            ->preload(),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Images')
                            ->schema([
                                Section::make('Images')
                                    ->schema([
                                        FileUpload::make('featured_image_path')
                                            ->label('Featured Image')
                                            ->image()
                                            ->directory('articles/featured-images')
                                            ->imageEditor()
                                            ->columnSpanFull(),

                                        TextInput::make('featured_image_alt')
                                            ->label('Featured Image Alt Text')
                                            ->maxLength(255)
                                            ->helperText('Describe the image clearly for accessibility and SEO.'),

                                        FileUpload::make('og_image_path')
                                            ->label('Open Graph Image')
                                            ->image()
                                            ->directory('articles/og-images')
                                            ->imageEditor(),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('SEO')
                            ->schema([
                                Section::make('SEO')
                                    ->schema([
                                        TextInput::make('seo_title')
                                            ->label('SEO Title')
                                            ->maxLength(255),

                                        Textarea::make('meta_description')
                                            ->label('Meta Description')
                                            ->rows(3)
                                            ->maxLength(160)
                                            ->helperText('Aim for 120–160 characters.')
                                            ->columnSpanFull(),

                                        TextInput::make('og_title')
                                            ->label('Open Graph Title')
                                            ->maxLength(255),

                                        Textarea::make('og_description')
                                            ->label('Open Graph Description')
                                            ->rows(3)
                                            ->maxLength(200)
                                            ->columnSpanFull(),

                                        Textarea::make('canonical_url')
                                            ->label('Canonical URL')
                                            ->rows(2)
                                            ->columnSpanFull(),

                                        Toggle::make('noindex')
                                            ->label('Noindex')
                                            ->default(false),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Publishing')
                            ->schema([
                                Section::make('Publishing')
                                    ->schema([
                                        Select::make('status')
                                            ->options([
                                                'draft' => 'Draft',
                                                'review' => 'Review',
                                                'scheduled' => 'Scheduled',
                                                'published' => 'Published',
                                                'archived' => 'Archived',
                                            ])
                                            ->default('draft')
                                            ->required()
                                            ->native(false),

                                        TextInput::make('reading_time')
                                            ->label('Reading Time')
                                            ->numeric()
                                            ->suffix('min'),

                                        Toggle::make('is_featured')
                                            ->label('Featured Article')
                                            ->default(false),

                                        DateTimePicker::make('published_at')
                                            ->label('Published At'),

                                        DateTimePicker::make('last_reviewed_at')
                                            ->label('Last Reviewed At'),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Safety Checks')
                            ->schema([
                                Section::make('Editorial safety checks')
                                    ->description('Internal checks to keep the article cautious, sourced, and non-medical-advice oriented.')
                                    ->schema([
                                        Toggle::make('has_medical_disclaimer')
                                            ->label('Medical disclaimer included')
                                            ->default(true),

                                        Toggle::make('claims_checked')
                                            ->label('Health claims checked')
                                            ->default(false),

                                        Toggle::make('sources_checked')
                                            ->label('Sources checked')
                                            ->default(false),

                                        Toggle::make('limitations_stated')
                                            ->label('Limitations clearly stated')
                                            ->default(false),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}