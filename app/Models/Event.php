<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Event extends Model
{
    use HasFactory, SoftDeletes;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title', 
        'slug', 
        'image', 
        'date', 
        'description',
        'days',
        'about',
        'ticket_amount',
        'exhibition_amount',
    ];

    /**
     * Get all of the features for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function features()
    {
        return $this->hasMany(Feature::class, 'event_id', 'id');
    }

    /**
     * Get all of the sponsors for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sponsors()
    {
        return $this->hasMany(Sponsor::class, 'event_id', 'id');
    }

    /**
     * Get all of the schedules for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'event_id', 'id');
    }

    /**
     * Get all of the blogs for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'event_id', 'id');
    }
}
