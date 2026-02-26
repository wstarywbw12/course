<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeFeature extends Model
{
    protected $table = 'home_feature';

    protected $fillable = [
        'title',
        'icon',
    ];
}