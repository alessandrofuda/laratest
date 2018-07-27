<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Events\NewMessageNotification;
use Illuminate\Support\Facades\Auth;


class MessageController extends Controller {


    public function __construct() {

        $this->middleware('auth');

    }
 



    public function index() {

        $user_id = Auth::user()->id; 
        $pusher_key = config('broadcasting.connections.pusher.key'); 
        $data = array('user_id' => $user_id, 'pusher_key' => $pusher_key);
        
        return view('broadcast', $data);

    }



    public function send() {

        // ...
         
        // message is being sent
        $message = new Message;
        $message->setAttribute('from', 1);
        $message->setAttribute('to', 2);
        $message->setAttribute('message', 'Demo message from user 1 to user 2');
        $message->save();
        



        // want to broadcast NewMessageNotification event
        event(new NewMessageNotification($message));


        // ...

    }


    /* public function pusher_auth($channel_name, $socket_id) {

        
        if (Auth::check()) {

          echo $pusher->socket_auth($_POST["$channel_name"], $_POST["$socket_id"]);
        
        } else {

          header('', true, 403);
          echo "Forbidden";

        }


        return;
    } */


}
