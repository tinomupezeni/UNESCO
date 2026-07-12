<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravel\Scout\Searchable;
use Spatie\Translatable\HasTranslations;

class Publication extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, Searchable, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'author',
        'cover_image',
        'file_path',
        'publication_date',
        'category',
        'isbn',
        'pages',
        'meta_title',
        'meta_description',
    ];

    protected $translatable = [
        'title',
        'description',
    ];

    protected $casts = [
        'publication_date' => 'date',
    ];

    protected static function booted(): void
    {
        static::creating(function (Publication $publication) {
            if (empty($publication->slug)) {
                $publication->slug = \Str::slug($publication->getTranslation('title', 'en') ?? $publication->title);
            }
        });

        static::updating(function (Publication $publication) {
            if ($publication->isDirty('title') && empty($publication->slug)) {
                $publication->slug = \Str::slug($publication->getTranslation('title', 'en') ?? $publication->title);
            }
        });
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->getTranslation('title', 'en'),
            'slug' => $this->slug,
            'description' => $this->getTranslation('description', 'en'),
            'author' => $this->author,
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover_image')
            ->singleFile();

        $this->addMediaCollection('file')
            ->singleFile();
    }
}
