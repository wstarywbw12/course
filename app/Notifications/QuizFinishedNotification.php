<?php

namespace App\Notifications;
use Illuminate\Notifications\Notification;

class QuizFinishedNotification extends Notification
{
    protected $quiz;
    protected $result;

    public function __construct($quiz, $result)
    {
        $this->quiz = $quiz;
        $this->result = $result;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Quiz selesai',
            'message' => 'Anda telah menyelesaikan quiz ' . $this->quiz->title,
            'url' => '/dasboard/courses/' . $this->quiz->course_id ,
            'score' => $this->result->score
        ];
    }
}