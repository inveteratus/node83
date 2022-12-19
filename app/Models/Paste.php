<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Monolog\DateTimeImmutable;

/**
 * @property int $id
 * @property string $content
 * @property DateTimeImmutable $expires
 * @property DateTimeImmutable $created_at
 * @property DateTimeImmutable $updated_at
 */
class Paste extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'expires',
    ];

    protected $casts = [
        'expires' => 'immutable_datetime',
    ];
}
