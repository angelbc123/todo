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
 *
 * @method Builder|self whereTodo()
 * @method Builder|self whereDone()
 */
class TodoStatus extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function scopeWhereTodo(Builder $builder): Builder
    {
        return $builder->where('name', 'todo');
    }

    public function scopeWhereDone(Builder $builder): Builder
    {
        return $builder->where('name', 'done');
    }
}
