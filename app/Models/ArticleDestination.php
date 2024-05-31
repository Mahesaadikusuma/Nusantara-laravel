<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleDestination extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'judul_article',
        'slug',
        'image',
        'body',
        'ratting_article_acc'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul_article',
            ]
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($articleDestination) {
            $articleDestination->slug = SlugService::createSlug($articleDestination, 'slug', $articleDestination->judul_article);
        });
    }

    public function UserRateDestination(): HasMany
    {
        return $this->hasMany(UserRateDestination::class, 'id_artikel_destinations', 'id');
    }
}
