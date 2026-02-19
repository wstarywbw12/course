<?php

namespace App\Http\Controllers;

use App\Models\UserQuizResult;
use Illuminate\Http\Request;

class ResultQuizController extends Controller
{
    public function index()
    {
        $results = UserQuizResult::with(['quiz', 'user'])
                    ->latest()
                    ->get();

        return view('pages.result_quiz.index', compact('results'));
    }
}
