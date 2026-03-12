<?php

namespace App\Notifications;
use Illuminate\Notifications\Notification;

class AdminNotification extends Notification
{
    protected $title;
    protected $message;
    protected $url;

    public function __construct($title,$message,$url)
    {
        $this->title = $title;
        $this->message = $message;
        $this->url = $url;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => $this->title,
            'message' => $this->message,
            'url' => $this->url
        ];
    }
}