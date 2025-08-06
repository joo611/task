<?php

// app/Notifications/NewPostNotification.php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewPostNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast']; 
    }

    public function toDatabase($notifiable): DatabaseMessage
    {
        return new DatabaseMessage([
            'post_id'    => $this->post->id,
            'title'      => $this->post->title,
            'created_by' => $this->post->user->username ?? 'Unknown',
        ]);
    }

    public function toBroadcast($notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'post_id'    => $this->post->id,
            'title'      => $this->post->title,
            'created_by' => $this->post->user->username ?? 'Unknown',
        ]);
    }
}
