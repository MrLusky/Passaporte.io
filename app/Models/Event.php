<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'date_time',
        'location',
        'capacity',
        'banner_path'
    ];

    protected $casts = [
        'date_time' => 'datetime'
    ];

    public function organizer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot([
                'ticket_code',
                'status'
            ])
            ->withTimestamps();
    }
}
