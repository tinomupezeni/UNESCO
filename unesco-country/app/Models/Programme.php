<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Scout\Searchable;
use Spatie\Translatable\HasTranslations;

class Programme extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, Searchable, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'content',
        'slug',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $translatable = [
        'title',
        'description',
        'content',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function (Programme $programme) {
            if (empty($programme->slug)) {
                $programme->slug = \Str::slug($programme->getTranslation('title', 'en') ?? $programme->title);
            }
        });

        static::updating(function (Programme $programme) {
            if ($programme->isDirty('title') && empty($programme->slug)) {
                $programme->slug = \Str::slug($programme->getTranslation('title', 'en') ?? $programme->title);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->getTranslation('title', 'en'),
            'slug' => $this->slug,
            'description' => $this->getTranslation('description', 'en'),
            'status' => $this->status,
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured_image')
            ->singleFile();
    }
}
