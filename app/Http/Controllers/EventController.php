<?php

namespace App\Http\Controllers;

use App\Events\NewEvent;
use App\Events\NewMessage;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Http\Request;
use Illuminate\Broadcasting\BroadcastController;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Bus;

class EventController extends Controller
{
    public function event(Request $request)
    {
        $order = "new event channel";
        for($i=0;$i<10000;$i++) {
            event(new NewEvent($order."_".$i));
        }
    }
    public function message()
    {
        event(new NewMessage('new message channel'));
    }
}
