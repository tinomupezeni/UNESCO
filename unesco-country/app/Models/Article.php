<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Scout\Searchable;
use Spatie\Translatable\HasTranslations;

class Article extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, Searchable, SoftDeletes;

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'slug',
        'category',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
    ];

    protected $translatable = [
        'title',
        'excerpt',
        'content',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Article $article) {
            if (empty($article->slug)) {
                $article->slug = \Str::slug($article->getTranslation('title', 'en') ?? $article->title);
            }
        });

        static::updating(function (Article $article) {
            if ($article->isDirty('title') && empty($article->slug)) {
                $article->slug = \Str::slug($article->getTranslation('title', 'en') ?? $article->title);
            }
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    public function scopeByCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->getTranslation('title', 'en'),
            'slug' => $this->slug,
            'excerpt' => $this->getTranslation('excerpt', 'en'),
            'content' => $this->getTranslation('content', 'en'),
            'category' => $this->category,
            'status' => $this->status,
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured_image')
            ->singleFile();
    }
}
