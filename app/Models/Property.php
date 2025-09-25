<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Traits\WithTemporaryMedia;

class Property extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, WithTemporaryMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'city',
        'address',
        'zip_code',
        'description',
        'amenities',
        'regulation',
        'number_of_units',
        'rooms',
        'bathrooms',
        'square_footage',
        'pets',
        'owner_pays', 
        'rent',
        'security',
        'security_relief_available',
        'comment'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'amenities' => 'array',
        'regulation' => 'array',
        'security_relief_available' => 'bool'
    ];

    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('thumbnail')
              ->crop(\Spatie\Image\Manipulations::CROP_CENTER, 150, 150)
              ->sharpen(10);
        $this->addMediaConversion('medium')
              ->width(300)
              ->sharpen(10);
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'owner_id');
    }

    public function tenants()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function scopeSearch($query, $key)
    {
        $key_like = "%{$key}%";
        return $query->where(function ($query) use($key_like) {
            $query->where(\DB::raw("concat(`address`, ', ', `city`, ' ', `zip_code`)"), 'like', $key_like)
                    ->orWhere(\DB::raw("concat(`address`, ' ', `city`, ' ', `zip_code`)"), 'like', $key_like);
        });
    }

    public function getFullAddressAttribute()
    {
        return "{$this->address}, {$this->city} {$this->zip_code}";
    }

}
