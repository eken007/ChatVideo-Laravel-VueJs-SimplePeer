<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class feedback implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $signal;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($signal, $user)
    {
        $this->signal=$signal;
        $this->user=$user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastWith(){
        return["signal"=>$this->signal];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('feedback.'.$this->user['id']);
    }
}
