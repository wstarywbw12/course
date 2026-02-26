<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeMaterial extends Model
{
    protected $table = 'home_materials';

    protected $fillable = [
        'title',
    ];
}