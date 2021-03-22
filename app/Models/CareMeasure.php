<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CareMeasure extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Uuid;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'care_measures';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'frequency'
    ];

    public static function search($query)
    {
        return static::query()->where('name', 'LIKE', '%'. $query . '%')
            ->orWhere('frequency', 'LIKE', '%'. $query . '%');
    }

    /**
     * The users (patients) that belong to the preventive care measures.
     */
    public function patients()
    {
        return $this->belongsToMany(
            "App\Models\User",
            "care_measure_user",
            "care_measure_id",
            "user_id"
        )->withPivot('id', 'reason_status_id', 'main_reason')
        ->withTimestamps();
    }
}
