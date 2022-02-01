<?php

namespace App\Http\Livewire\Notification;

use App\Models\Notification;
use LivewireUI\Modal\ModalComponent;

class Delete extends ModalComponent
{
    public $notification;

    public function render()
    {
        return view('livewire.notification.delete');
    }

    public function mount(Notification $notification)
    {
         $this->notification = $notification;
    }

    public function destroy(Notification $notification)
    {
        $notification->delete();
        $this->closeModal();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Shuffle Already Deleted!!"
        ]);
        $this->emit('refreshData');
    }
}
