<?php

namespace App\Events;

// app/Events/EphemeralMessageEvent.php

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class EphemeralMessageEvent implements ShouldBroadcast
{
    use SerializesModels;

    public $user;
    public $message;
    public $timestamp;
    public $schoolId;

    public function __construct($user, $message)
    {
        $this->user = $user->name;
        $this->message = $message;
        $this->timestamp = now()->format('H:i');
        $this->schoolId = $user->school_id;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('ephemeral-chat.' . $this->schoolId);
    }

    public function broadcastWith()
    {
        return [
            'user' => $this->user,
            'message' => $this->message,
            'timestamp' => $this->timestamp,
        ];
    }
}
