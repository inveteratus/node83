<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snippet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'tags',
        'public',
    ];

    protected $casts = [
        'tags' => 'array',
        'public' => 'boolean',
    ];
}
