<?php

namespace App\Models;

use App\Models\Concerns\HasUniqueSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    use HasUniqueSlug;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'seo_title',
        'meta_description',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
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
}