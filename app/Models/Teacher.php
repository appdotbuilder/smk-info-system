<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Teacher
 *
 * @property int $id
 * @property int $user_id
 * @property string $employee_number
 * @property string|null $nip
 * @property string|null $nuptk
 * @property \Illuminate\Support\Carbon $birth_date
 * @property string $birth_place
 * @property string $gender
 * @property string $education_level
 * @property string|null $subject_specialization
 * @property \Illuminate\Support\Carbon $hire_date
 * @property string $employment_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Schedule> $schedules
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SchoolClass> $homeroomClasses
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereEmployeeNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereNip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereNuptk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereBirthPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereEducationLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereSubjectSpecialization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereHireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereEmploymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereUpdatedAt($value)
 * @method static \Database\Factories\TeacherFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class Teacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'employee_number',
        'nip',
        'nuptk',
        'birth_date',
        'birth_place',
        'gender',
        'education_level',
        'subject_specialization',
        'hire_date',
        'employment_status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
        'hire_date' => 'date',
    ];

    /**
     * Get the user that owns the teacher.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the schedules for the teacher.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class, 'teacher_id', 'user_id');
    }

    /**
     * Get the homeroom classes for the teacher.
     */
    public function homeroomClasses(): HasMany
    {
        return $this->hasMany(SchoolClass::class, 'homeroom_teacher_id', 'user_id');
    }
}