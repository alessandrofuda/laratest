<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
// use Illuminate\Contracts\Broadcasting\ShouldBroadcast;  // add in event queue
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use App\Message;


class NewMessageNotification implements ShouldBroadcastNow {


    use Dispatchable, InteractsWithSockets, SerializesModels;



    public $message;




    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }




    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // dd(new PrivateChannel('user.2'));


        // dump('PrivateChannel name: '. 'user.'.$this->message->to);


        return new PrivateChannel('user.'.$this->message->to);  // private--> only to logged-in users  user.2  // PrivateChannel()



        // generated PrivateChannel name: 'private-user.2'
    }


}
