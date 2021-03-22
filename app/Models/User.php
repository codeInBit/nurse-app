<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Uuid;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_nurse',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_nurse' => 'boolean',
        'is_admin' => 'boolean',
    ];

    public static function patient()
    {
        return static::query()->whereIsNurse(false)->whereIsAdmin(false);
    }

    /**
     * The preventive care measure that belong to the user.
     */
    public function preventiveCareMeasures()
    {
        return $this->belongsToMany(
            "App\Models\CareMeasure",
            "care_measure_user",
            "user_id",
            "care_measure_id"
        )->withPivot('id', 'reason_status_id', 'main_reason')
        ->withTimestamps();
    }
}
