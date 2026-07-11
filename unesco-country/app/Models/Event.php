<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasFactory, HasTranslations, Searchable, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'content',
        'slug',
        'location',
        'start_date',
        'end_date',
        'status',
        'meta_title',
        'meta_description',
    ];

    protected $translatable = [
        'title',
        'description',
        'content',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (Event $event) {
            if (empty($event->slug)) {
                $event->slug = \Str::slug($event->getTranslation('title', 'en') ?? $event->title);
            }
        });

        static::updating(function (Event $event) {
            if ($event->isDirty('title') && empty($event->slug)) {
                $event->slug = \Str::slug($event->getTranslation('title', 'en') ?? $event->title);
            }
        });
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->getTranslation('title', 'en'),
            'slug' => $this->slug,
            'description' => $this->getTranslation('description', 'en'),
            'location' => $this->location,
            'status' => $this->status,
        ];
    }

    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now())
            ->where('status', 'published');
    }

    public function scopePast($query)
    {
        return $query->where('end_date', '<', now());
    }
}
