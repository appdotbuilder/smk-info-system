<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Schedule
 *
 * @property int $id
 * @property int $class_id
 * @property int $subject_id
 * @property int $teacher_id
 * @property string $day_of_week
 * @property \Illuminate\Support\Carbon $start_time
 * @property \Illuminate\Support\Carbon $end_time
 * @property string|null $room
 * @property int $academic_year_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\SchoolClass $schoolClass
 * @property-read \App\Models\Subject $subject
 * @property-read \App\Models\User $teacher
 * @property-read \App\Models\AcademicYear $academicYear
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereDayOfWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereAcademicYearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Schedule whereUpdatedAt($value)
 * @method static \Database\Factories\ScheduleFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Schedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'class_id',
        'subject_id',
        'teacher_id',
        'day_of_week',
        'start_time',
        'end_time',
        'room',
        'academic_year_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_time' => 'datetime:H:i:s',
        'end_time' => 'datetime:H:i:s',
    ];

    /**
     * Get the class that the schedule belongs to.
     */
    public function schoolClass(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    /**
     * Get the subject for the schedule.
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the teacher for the schedule.
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    /**
     * Get the academic year for the schedule.
     */
    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }
}