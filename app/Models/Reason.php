<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reason extends Model
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
        'title',
        'title_field'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'title_field' => 'array'
    ];

    /**
     * The statuses that belong to the reason.
     */
    public function statuses()
    {
        return $this->belongsToMany(
            "App\Models\Status",
            "reason_status",
            "reason_id",
            "status_id"
        )->withPivot('id')
        ->withTimestamps();
    }
}
