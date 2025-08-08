<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\StudentFee
 *
 * @property int $id
 * @property int $student_id
 * @property int $fee_type_id
 * @property int $academic_year_id
 * @property string|null $month
 * @property float $amount
 * @property \Illuminate\Support\Carbon $due_date
 * @property string $status
 * @property float $paid_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \App\Models\User $student
 * @property-read \App\Models\FeeType $feeType
 * @property-read \App\Models\AcademicYear $academicYear
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee query()
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee whereFeeTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee whereAcademicYearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee whereMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee wherePaidAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StudentFee whereUpdatedAt($value)
 * @method static \Database\Factories\StudentFeeFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class StudentFee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'student_id',
        'fee_type_id',
        'academic_year_id',
        'month',
        'amount',
        'due_date',
        'status',
        'paid_amount',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'due_date' => 'date',
        'amount' => 'decimal:2',
        'paid_amount' => 'decimal:2',
    ];

    /**
     * Get the student that owns the fee.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    /**
     * Get the fee type for the student fee.
     */
    public function feeType(): BelongsTo
    {
        return $this->belongsTo(FeeType::class);
    }

    /**
     * Get the academic year for the student fee.
     */
    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class);
    }
}