<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin Builder
 *
 * @property int $id
 * @property int $owned_by
 * @property int $project_id
 * @property int $todo_status_id
 * @property string $description
 * @property int $view_counter
 *
 * @property User $user
 * @property Project $project
 * @property TodoStatus $todoStatus
 */
class Todo extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owned_by');
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function todoStatus(): BelongsTo
    {
        return $this->belongsTo(TodoStatus::class);
    }
}
