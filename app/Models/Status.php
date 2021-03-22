<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * The statuses that belong to the reason.
     */
    public function reasons()
    {
        return $this->belongsToMany(
            "App\Models\Reason",
            "reason_status",
            "status_id",
            "reason_id"
        )->withPivot('id')
        ->withTimestamps();
    }
}
