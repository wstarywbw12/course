<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller
{
    public function index(Quiz $quiz)
    {
        $quiz->load('questions.options');
        return view('pages.courses.quiz.questions.index', compact('quiz'));
    }

    public function store(Request $request, Quiz $quiz)
    {
        $request->validate([
            'question' => 'required',
            'options.*.text' => 'required',
            'correct_option' => 'required'
        ]);

        $question = $quiz->questions()->create([
            'question' => $request->question
        ]);

        foreach ($request->options as $key => $option) {
            $question->options()->create([
                'option_text' => $option['text'],
                'is_correct' => $request->correct_option == $key
            ]);
        }

        return back()->with('success', 'Soal berhasil ditambahkan');
    }

    public function update(Request $request, QuizQuestion $question)
{
    $request->validate([
        'question' => 'required',
        'options.*.text' => 'required',
        'correct_option' => 'required'
    ]);

    $question->update([
        'question' => $request->question
    ]);

    foreach ($question->options as $key => $option) {
        $option->update([
            'option_text' => $request->options[$key]['text'],
            'is_correct' => $request->correct_option == $key
        ]);
    }

    return back()->with('success', 'Soal berhasil diperbarui');
}

    public function destroy(QuizQuestion $question)
    {
        $question->delete();
        return back()->with('success', 'Soal berhasil dihapus');
    }
}
