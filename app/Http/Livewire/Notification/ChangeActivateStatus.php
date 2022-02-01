<?php

namespace App\Http\Livewire\Notification;

use App\Models\Notification;
use LivewireUI\Modal\ModalComponent;

class ChangeActivateStatus extends ModalComponent
{
    public $notification;

    public function render()
    {
        return view('livewire.notification.change-activate-status');
    }

    public function mount(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function deactivate()
    {
        $this->notification->update(['active' => false]);

        $this->closeModal();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Notification Has Been Deactive!!"
        ]);
        $this->emit('refreshData');
    }

    public function activate()
    {
        $notifications = Notification::all();
        foreach ($notifications as $notification) {
            if ($notification->active) {
                $notification->update(['active' => false]);
            }
        }

        $this->notification->update(['active' => true]);

        $this->closeModal();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Notification Has Active!!"
        ]);
        $this->emit('refreshData');
    }
}
