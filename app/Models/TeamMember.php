<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class TeamMember extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia;

    protected $fillable = [
        'name',
        'title',
        'bio',
        'email',
        'social_links',
    ];

    protected $translatable = [
        'title',
        'bio',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    protected $attributes = [
        'social_links' => '{}',
    ];

    public function getSocialLinksAttribute($value): array
    {
        if (is_array($value)) {
            return $value;
        }

        if (is_string($value) && ! empty($value)) {
            $decoded = json_decode($value, true);

            return is_array($decoded) ? $decoded : [];
        }

        return [];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')
            ->singleFile();
    }
}
