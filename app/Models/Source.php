<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'authors',
        'journal',
        'year',
        'doi',
        'pmid',
        'url',
        'source_type',
        'evidence_level',
        'note',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
        ];
    }
}