<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMaterialActivity extends Model
{
    protected $fillable = [
        'user_id',
        'material_id',
        'activity_type',
        'activity_time'
    ];

    public function material()
    {
        return $this->belongsTo(CourseMaterial::class, 'material_id');
    }
}

