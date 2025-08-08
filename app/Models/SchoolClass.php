<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\SchoolClass
 *
 * @property int $id
 * @property string $name
 * @property string $grade
 * @property string $major
 * @property int|null $homeroom_teacher_id
 * @property int $academic_year_id
 * @property int $capacity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\User|null $homeroomTeacher
 * @property-read \App\Models\AcademicYear $academicYear
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Student> $students
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Schedule> $schedules
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolClass newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolClass newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolClass query()
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolClass whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolClass whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolClass whereGrade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolClass whereMajor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolClass whereHomeroomTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolClass whereAcademicYearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolClass whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolClass whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SchoolClass whereUpdatedAt($value)
 * @method static \Database\Factories\SchoolClassFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class SchoolClass extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'grade',
        'major',
        'homeroom_teacher_id',
        'academic_year_id',
        'capacity',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'capacity' => 'integer',
    ];

    /**
     * Get the homeroom teacher for the class.
     */
    public function homeroomTeacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'homeroom_teacher_id');
    }

    /**
     * Get the academic year for the class.
     */
    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }

    /**
     * Get the students in the class.
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    /**
     * Get the schedules for the class.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'class_id');
    }
}