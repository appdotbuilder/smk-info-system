<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\AssignmentSubmission
 *
 * @property int $id
 * @property int $assignment_id
 * @property int $student_id
 * @property string|null $content
 * @property mixed|null $attachments
 * @property \Illuminate\Support\Carbon $submitted_at
 * @property float|null $score
 * @property string|null $feedback
 * @property int|null $graded_by
 * @property \Illuminate\Support\Carbon|null $graded_at
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\Assignment $assignment
 * @property-read \App\Models\User $student
 * @property-read \App\Models\User|null $gradedBy
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereAssignmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereAttachments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereSubmittedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereGradedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereGradedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssignmentSubmission whereUpdatedAt($value)
 * @method static \Database\Factories\AssignmentSubmissionFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class AssignmentSubmission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'assignment_id',
        'student_id',
        'content',
        'attachments',
        'submitted_at',
        'score',
        'feedback',
        'graded_by',
        'graded_at',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'attachments' => 'json',
        'submitted_at' => 'datetime',
        'graded_at' => 'datetime',
        'score' => 'decimal:2',
    ];

    /**
     * Get the assignment for the submission.
     */
    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * Get the student who submitted the assignment.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the teacher who graded the submission.
     */
    public function gradedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'graded_by');
    }
}