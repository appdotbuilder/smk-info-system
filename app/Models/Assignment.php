<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Assignment
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $subject_id
 * @property int $teacher_id
 * @property int $class_id
 * @property \Illuminate\Support\Carbon $due_date
 * @property int $max_score
 * @property mixed|null $attachments
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Subject $subject
 * @property-read \App\Models\User $teacher
 * @property-read \App\Models\SchoolClass $schoolClass
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\AssignmentSubmission> $submissions
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereMaxScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereAttachments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assignment whereUpdatedAt($value)
 * @method static \Database\Factories\AssignmentFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Assignment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'subject_id',
        'teacher_id',
        'class_id',
        'due_date',
        'max_score',
        'attachments',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'due_date' => 'datetime',
        'attachments' => 'json',
        'max_score' => 'integer',
    ];

    /**
     * Get the subject for the assignment.
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the teacher who created the assignment.
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Get the class for the assignment.
     */
    public function schoolClass(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Get the submissions for the assignment.
     */
    public function submissions(): HasMany
    {
        return $this->hasMany(AssignmentSubmission::class);
    }
}