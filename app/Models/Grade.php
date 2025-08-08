<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Grade
 *
 * @property int $id
 * @property int $student_id
 * @property int $subject_id
 * @property int $teacher_id
 * @property string $semester
 * @property int $academic_year_id
 * @property string $grade_type
 * @property string $title
 * @property float $score
 * @property float $weight
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\User $student
 * @property-read \App\Models\Subject $subject
 * @property-read \App\Models\User $teacher
 * @property-read \App\Models\AcademicYear $academicYear
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Grade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade query()
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereSemester($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereAcademicYearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereGradeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grade whereUpdatedAt($value)
 * @method static \Database\Factories\GradeFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Grade extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'subject_id',
        'teacher_id',
        'semester',
        'academic_year_id',
        'grade_type',
        'title',
        'score',
        'weight',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'score' => 'decimal:2',
        'weight' => 'decimal:2',
    ];

    /**
     * Get the student that owns the grade.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the subject that the grade belongs to.
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the teacher that created the grade.
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Get the academic year for the grade.
     */
    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }
}