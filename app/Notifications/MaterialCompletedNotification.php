<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
class MaterialCompletedNotification extends Notification
{
    protected $material;

    public function __construct($material)
    {
        $this->material = $material;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Materi selesai dipelajari',
            'message' => 'Anda telah menyelesaikan materi: '.$this->material->title,
            'url' => '/dasboard/courses/'.$this->material->course_id
        ];
    }
}