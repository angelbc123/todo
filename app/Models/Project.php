<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 *
 * @property int $id
 * @property string $name
 * @property User $user
 *
 * @method whereUser(User $user)
 */
class Project extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWhereUser(Builder $builder, User $user)
    {
        return $builder->where('user_id', $user->id);
    }
}
