<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuizAnswer extends Model
{
    protected $fillable = [
        'user_id',
        'quiz_id',
        'quiz_question_id',
        'quiz_option_id',
        'is_correct'
    ];
}
