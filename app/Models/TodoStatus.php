<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 */
class TodoStatus extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
}
