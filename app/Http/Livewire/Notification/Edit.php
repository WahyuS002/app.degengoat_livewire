<?php

namespace App\Http\Livewire\Notification;

use App\Models\Notification;
use LivewireUI\Modal\ModalComponent;

class Edit extends ModalComponent
{
    public $notification;
    public $content, $started_at, $ended_at;

    protected $rules = [
        'content' => 'required',
        'started_at' => 'required',
        'ended_at' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.notification.edit');
    }

    public function mount(Notification $notification)
    {
         $this->content = $notification->content;
         $this->started_at = $notification->started_at;
         $this->ended_at = $notification->ended_at;
         $this->notification = $notification;
    }

    public function update()
    {
        $validatedData = $this->validate();
        $this->notification->update($validatedData);
        $this->closeModal();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Notification Updated Successfully!!"
        ]);
        $this->emit('refreshData');
    }
}
