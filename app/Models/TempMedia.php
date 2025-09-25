<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TempMedia extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('thumbnail')
              ->crop(\Spatie\Image\Manipulations::CROP_CENTER, 150, 150)
              ->sharpen(10);
        $this->addMediaConversion('medium')
              ->width(300)
              ->sharpen(10);
    }
}
