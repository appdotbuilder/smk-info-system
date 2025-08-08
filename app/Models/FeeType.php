<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\FeeType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property float $amount
 * @property string $frequency
 * @property bool $is_mandatory
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * 
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StudentFee> $studentFees
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereIsMandatory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FeeType whereUpdatedAt($value)
 * @method static \Database\Factories\FeeTypeFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class FeeType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'amount',
        'frequency',
        'is_mandatory',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'amount' => 'decimal:2',
        'is_mandatory' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get the student fees for the fee type.
     */
    public function studentFees(): HasMany
    {
        return $this->hasMany(StudentFee::class);
    }
}