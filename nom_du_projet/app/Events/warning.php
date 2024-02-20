<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class warning implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user;
    public $name;
    public $signal;
    public $emetteur;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name, $user, $signal,$emetteur)
    {
        $this->name=$name;
        $this->user=$user;
        $this->signal=$signal;
        $this->emetteur=$emetteur;
    }
    public function broadcastWith(){
        return["name"=>$this->name, "signal"=>$this->signal, "emetteur"=>$this->emetteur];
    }
    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('warning.'.$this->user->id);
    }
}
