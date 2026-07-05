<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait HasUniqueSlug
{
    protected static function bootHasUniqueSlug(): void
    {
        static::saving(function ($model) {
            $slugSource = method_exists($model, 'getSlugSource')
                ? $model->getSlugSource()
                : ($model->name ?? $model->title ?? null);

            if (! $slugSource) {
                return;
            }

            $baseSlug = $model->slug
                ? Str::slug($model->slug)
                : Str::slug($slugSource);

            $slug = $baseSlug;
            $counter = 2;

            while (
                static::query()
                    ->where('slug', $slug)
                    ->when($model->exists, fn ($query) => $query->whereKeyNot($model->getKey()))
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $model->slug = $slug;
        });
    }
}