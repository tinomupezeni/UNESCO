<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Scout\Searchable;
use Spatie\Translatable\HasTranslations;

class Page extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, Searchable, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $translatable = [
        'title',
        'content',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    protected static function booted(): void
    {
        static::creating(function (Page $page) {
            if (empty($page->slug)) {
                $page->slug = \Str::slug($page->getTranslation('title', 'en') ?? $page->title);
            }
        });

        static::updating(function (Page $page) {
            if ($page->isDirty('title') && empty($page->slug)) {
                $page->slug = \Str::slug($page->getTranslation('title', 'en') ?? $page->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->getTranslation('title', 'en'),
            'slug' => $this->slug,
            'content' => $this->getTranslation('content', 'en'),
            'status' => $this->status,
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured_image')
            ->singleFile();
    }
}
