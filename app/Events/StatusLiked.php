<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class StatusLiked implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;

    public $message;

    public $id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($username,$id)
    {
        $this->id=$id;
        $this->username = $username;
        $this->message  = "<html><body><p>{$username} liked your status</p></body></html>";
        
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        //dd($this->id);
        return ['status-liked'.$this->id];
    }
}
