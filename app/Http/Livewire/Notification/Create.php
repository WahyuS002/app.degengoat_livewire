<?php

namespace App\Http\Livewire\Notification;

use App\Models\Notification;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public $content, $started_at, $ended_at;

    protected $rules = [
        'content' => 'required',
        'started_at' => 'required',
        'ended_at' => 'required',
    ];

    public function render()
    {
        return view('livewire.notification.create');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetInputFields()
    {
         $this->content = '';
         $this->started_at = '';
         $this->ended_at = '';
    }

    public function store()
    {
        $validatedData = $this->validate();

        Notification::create($validatedData);
        $this->closeModal();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Notification Created Successfully!!"
        ]);
        $this->emit('refreshData');
        $this->resetInputFields();
    }
}
