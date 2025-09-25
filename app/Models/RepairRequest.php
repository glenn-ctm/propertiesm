<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class RepairRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'maintenance',
        'landscaping',
        'management_needs',
        'inspections',
        'frequency_of_inspection',
        'number_of_units',
        'address',
        'contact_number',
        'opt_out',
        'status',
        'remarks',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'maintenance' => 'array',
        'management_needs' => 'array',
        'inspections' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function getCommentAttribute()
    {
        return optional($this->comments()->latest()->first())->body;
    }

    public function createComment($message)
    {
        if( $this->comment === $message ) {
            return;
        }
        return $this->comments()->create([
            'body' => $message,
            'user_id' => auth()->user()->id
        ]);
    }

    public function scopeSearch($query, $key)
    {
        $key_like = '%'.$key.'%';
        return $query->whereHas('user', function($q) use($key_like){
            return $q->where('name', 'like', $key_like)
                ->orWhere('pin', 'like', $key_like);
        });
    }
}
