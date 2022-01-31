<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;

class Edit extends Component
{
    // public $notification;
    public $content, $started_at, $ended_at;
    public $open_modal = false;

    public function render()
    {
        return view('livewire.notification.edit');
    }

    public function mount($notification)
    {
         $this->content = $notification->content;
         $this->started_at = $notification->started_at;
         $this->endede_at = $notification->ended_at;
    }
}
