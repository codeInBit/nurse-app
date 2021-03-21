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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    public static function search($query)
    {
        return static::query()->where('name', 'LIKE', '%'. $query . '%');
    }
}
