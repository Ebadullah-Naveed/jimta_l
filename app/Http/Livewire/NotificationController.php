<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notification;

class NotificationController extends Component
{
    public $message;

    public function render()
    {
        return view('livewire.notification-controller');
    }

    public function sendNotification()
    {
        $nortification = Notification::create(['message'=>$this->message]);
        if($nortification)
        {
            $this->message = null;
                $this->dispatchBrowserEvent('alert',[
                    'type'=>'success',
                    'message'=>"Notification Send"]);  
        }
                
    }
}
