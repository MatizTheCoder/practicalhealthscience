<?php

namespace App\Models;

use App\Models\Concerns\HasUniqueSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
    use HasUniqueSlug;
    use SoftDeletes;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_REVIEW = 'review';
    public const STATUS_SCHEDULED = 'scheduled';
    public const STATUS_PUBLISHED = 'published';
    public const STATUS_ARCHIVED = 'archived';

    public const FORMAT_EXPLAINER = 'explainer';
    public const FORMAT_MYTH_CHECK = 'myth_check';
    public const FORMAT_RESEARCH_BREAKDOWN = 'research_breakdown';
    public const FORMAT_PRACTICAL_TAKEAWAY = 'practical_takeaway';
    public const FORMAT_EMERGING_THERAPY_EXPLAINED = 'emerging_therapy_explained';
    public const FORMAT_EVIDENCE_BRIEF = 'evidence_brief';

    protected $fillable = [
        'category_id',
        'author_id',

        'title',
        'slug',
        'subtitle',
        'excerpt',

        'content_format',
        'status',
        'body',

        'quick_answer',
        'what_the_science_says',
        'evidence_strength',
        'limitations_summary',
        'real_life_meaning',
        'key_takeaway',

        'featured_image_path',
        'featured_image_alt',

        'seo_title',
        'meta_description',
        'og_title',
        'og_description',
        'og_image_path',
        'canonical_url',
        'noindex',

        'reading_time',
        'is_featured',

        'has_medical_disclaimer',
        'claims_checked',
        'sources_checked',
        'limitations_stated',

        'published_at',
        'last_reviewed_at',
    ];

    protected function casts(): array
    {
        return [
            'noindex' => 'boolean',
            'is_featured' => 'boolean',
            'has_medical_disclaimer' => 'boolean',
            'claims_checked' => 'boolean',
            'sources_checked' => 'boolean',
            'limitations_stated' => 'boolean',
            'reading_time' => 'integer',
            'published_at' => 'datetime',
            'last_reviewed_at' => 'datetime',
        ];
    }

    public function getSlugSource(): string
    {
        return $this->title;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)
            ->withTimestamps();
    }

    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Series::class, 'article_series')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    public function sources(): BelongsToMany
    {
        return $this->belongsToMany(Source::class, 'article_source')
            ->withPivot(['sort_order', 'citation_note'])
            ->withTimestamps();
    }

    public function relatedArticles(): BelongsToMany
    {
        return $this->belongsToMany(
            Article::class,
            'article_relations',
            'article_id',
            'related_article_id'
        )
            ->withPivot(['relation_type', 'sort_order'])
            ->withTimestamps();
    }

    protected static function booted(): void
    {
        static::saving(function (Article $article) {
            $article->reading_time = $article->reading_time ?: $article->calculateReadingTime();

            if ($article->status === self::STATUS_PUBLISHED && ! $article->published_at) {
                $article->published_at = now();
            }

            if (! $article->seo_title) {
                $article->seo_title = Str::limit($article->title, 60, '');
            }

            if (! $article->meta_description && $article->excerpt) {
                $article->meta_description = Str::limit(strip_tags($article->excerpt), 160, '');
            }

            if (! $article->og_title) {
                $article->og_title = $article->seo_title ?: $article->title;
            }

            if (! $article->og_description && $article->meta_description) {
                $article->og_description = $article->meta_description;
            }
        });
    }
    public function getPublishReadinessAttribute(): string
    {
        if (! $this->has_medical_disclaimer) {
            return 'No disclaimer';
        }

        if (! $this->sources_checked) {
            return 'Missing sources';
        }

        if (! $this->claims_checked) {
            return 'Claims not checked';
        }

        if (! $this->limitations_stated) {
            return 'Missing limitations';
        }

        if (! $this->body) {
            return 'Missing body';
        }

        if (! $this->excerpt) {
            return 'Missing excerpt';
        }

        if (! $this->quick_answer) {
            return 'Missing quick answer';
        }

        if (! $this->what_the_science_says) {
            return 'Missing science summary';
        }

        if (! $this->limitations_summary) {
            return 'Missing limitations text';
        }

        if (! $this->real_life_meaning) {
            return 'Missing real-life meaning';
        }

        if (! $this->key_takeaway) {
            return 'Missing takeaway';
        }

        return 'Ready';
    }

    public function getPublishReadinessColorAttribute(): string
    {
        return match ($this->publish_readiness) {
            'Ready' => 'success',
            'No disclaimer',
            'Missing sources',
            'Claims not checked',
            'Missing limitations',
            'Missing body',
            'Missing excerpt',
            'Missing quick answer',
            'Missing science summary',
            'Missing limitations text',
            'Missing real-life meaning',
            'Missing takeaway' => 'warning',
            default => 'gray',
        };
    }

    public function calculateReadingTime(): int
    {
        $content = collect([
            $this->body,
            $this->quick_answer,
            $this->what_the_science_says,
            $this->limitations_summary,
            $this->real_life_meaning,
            $this->key_takeaway,
        ])
            ->filter()
            ->implode(' ');

        $wordCount = str_word_count(strip_tags($content));

        return max(1, (int) ceil($wordCount / 220));
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('status', self::STATUS_PUBLISHED)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_DRAFT);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function scopeNoindex(Builder $query): Builder
    {
        return $query->where('noindex', true);
    }
}
