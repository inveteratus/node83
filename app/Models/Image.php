<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $filename
 * @property string $original
 * @property DateTimeImmutable $expires
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $updated_at
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'original',
        'expires',
    ];

    protected $casts = [
        'expires' => 'immutable_datetime',
    ];
}
