<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'uploaded_at',
        'date_taken',
        'latitude',
        'longitude',
        'metadata',
    ];

    protected $casts = [
        'uploaded_at' => 'datetime',
        'date_taken' => 'datetime',
        'metadata' => 'array',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

}
