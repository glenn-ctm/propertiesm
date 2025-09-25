<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\Traits\WithTemporaryMedia;

class VideosRecordingsPictures extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, WithTemporaryMedia;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'date',
        'address',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'datetime',
    ];


    public function getBeginAttribute($date) {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('hh:mm');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('thumbnail')
              ->crop(\Spatie\Image\Manipulations::CROP_CENTER, 150, 150)
              ->sharpen(10);
    }

    public function scopeSearch($query, $key)
    {
        $key_like = '%' . $key . '%';
        return $query->whereHas('user', function($q) use($key_like) {
            $q->where('pin', 'like', $key_like);
        });
    }

}
