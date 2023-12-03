<?php

namespace App\Models;

use App\Enums\TaskEnums\TaskPriorities;
use App\Enums\TaskEnums\TaskStatuses;
use Database\Factories\TaskFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Task
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $assign_by
 * @property int|null $assign_to
 * @property int $status
 * @property string $due_date
 * @property int $priority
 * @property int|null $blocked_by
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static TaskFactory factory($count = null, $state = [])
 * @method static Builder|Task newModelQuery()
 * @method static Builder|Task newQuery()
 * @method static Builder|Task onlyTrashed()
 * @method static Builder|Task query()
 * @method static Builder|Task whereAssignBy($value)
 * @method static Builder|Task whereAssignTo($value)
 * @method static Builder|Task whereBlockedBy($value)
 * @method static Builder|Task whereCreatedAt($value)
 * @method static Builder|Task whereDeletedAt($value)
 * @method static Builder|Task whereDescription($value)
 * @method static Builder|Task whereDueDate($value)
 * @method static Builder|Task whereId($value)
 * @method static Builder|Task whereName($value)
 * @method static Builder|Task wherePriority($value)
 * @method static Builder|Task whereStatus($value)
 * @method static Builder|Task whereUpdatedAt($value)
 * @method static Builder|Task withTrashed()
 * @method static Builder|Task withoutTrashed()
 * @property-read User|null $assignee
 * @property-read User $assigner
 * @property-read Task|null $blocker
 * @mixin Eloquent
 */
class Task extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'description',
        'assign_by',
        'assign_to',
        'status',
        'due_date',
        'priority',
        'blocked_by',
    ];

    protected $casts = [
        'status' => TaskStatuses::class,
        'priority' => TaskPriorities::class,
        'due_date' => 'datetime',
    ];

    public function assigner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assign_by', 'id');
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assign_to', 'id');
    }

    public function blocker(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'blocked_by');
    }
}
