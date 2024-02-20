<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Hello implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $name;
    public $message;
    public $id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name,$message,$id)
    {
        $this->name=$name;
        $this->message=$message;
        $this->id=$id;
    }
    public function broadcastWith(){
        return ["message"=>[
            "name"=>$this->name,    
            "message"=>$this->message,
            "id"=>$this->id,
            ]];
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('public');
    }
}
