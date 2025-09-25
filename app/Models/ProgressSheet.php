<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressSheet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'property_address',
        'status',
        'comment',
        'date',
        'ls_per_week',
        'sc_per_week',
        'ls_amount_per_week',
        'sc_amount_per_week'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'ls_per_week' => 'array',
        'sc_per_week' => 'array',
        'date' => 'datetime:Y-m-d'
    ];

    public function items()
    {
        return $this->hasMany(ProgressSheetItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
