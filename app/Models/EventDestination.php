<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventDestination extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'id_destinations',
        'name_event',
        'slug',
        'location_event',
        'ratting_event_destination_acc',
        'image_event',
        'description_event_destination',
        'date_event',
        'price_event'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_event',
            ]
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($event) {
            $event->slug = SlugService::createSlug($event, 'slug', $event->name_event);
        });
    }

    /**
     * Get all of the EventDestination for the Destination
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function UserRateDestination(): HasMany
    {
        return $this->hasMany(UserRateDestination::class, 'id_event_destinations', 'id');
    }
}
