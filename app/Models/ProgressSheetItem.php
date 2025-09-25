<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressSheetItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'progress_sheet_id',
        'unit',
        'rents',
        'repairs',
        'tl',
        'subc',
        'cost',
        'inspection',
        'new_occupant',
        'eviction',
    ];

    protected $casts = [
        'rents' => 'array',
        'inspection' => 'array',
        'new_occupant' => 'datetime:Y-m-d',
        'eviction' => 'datetime:Y-m-d',
        'tl' => 'boolean',
        'subc' => 'boolean'
    ];

    public function sheet()
    {
        return $this->belongsTo(ProgressSheet::class);
    }
}
