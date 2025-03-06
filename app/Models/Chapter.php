<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'number',
        'views',
        'slug',
        'status',
        'updated_content_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'updated_content_at'
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function scopeTodayChapters($query)
    {
        return $query->whereDate('updated_at', Carbon::today());
    }
}
