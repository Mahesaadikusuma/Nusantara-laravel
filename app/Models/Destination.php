<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destination extends Model
{
    use HasFactory, SoftDeletes,Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'location',
        'thubmnail',
        'price',
        'ratting_destination_acc',
        'name_event_destination',
        'date_event'
       
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }

     protected static function boot()
    {
        parent::boot();

        static::updating(function ($destination) {
            $destination->slug = SlugService::createSlug($destination, 'slug', $destination->name);
        });
    }
    
    // /**
    //  * Get the fasilitas that owns the Destination
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  */
    // public function fasilitas(): BelongsTo
    // {
    //     return $this->belongsTo(FasilitasDestination::class, 'id', 'id_destinations');
    // }

    /**
     * Get the fasilitas associated with the Destination
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fasilitas(): HasOne
    {
        return $this->hasOne(FasilitasDestination::class, 'id_destinations', 'id');
    }

    // /**
    //  * Get all of the comments for the Destination
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function fasilitas(): HasMany
    // {
    //     return $this->hasMany(FasilitasDestination::class, 'id_destinations', 'id');
    // }


    /**
     * Get all of the EventDestination for the Destination
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function EventDestination(): HasMany
    {
        return $this->hasMany(EventDestination::class, 'id_destinations', 'id');
    }


    /**
     * Get all of the EventDestination for the Destination
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function UserRateDestination(): HasMany
    {
        return $this->hasMany(UserRateDestination::class, 'id_destinations', 'id');
    }
}
