<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'name',
        'description',
        'code',
        'iso_code',
    ];

    protected $translatable = [
        'name',
        'description',
    ];

    public function designations()
    {
        return $this->hasMany(Designation::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
