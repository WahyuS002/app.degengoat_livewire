<?php

namespace App\Http\Livewire\Notification;

use App\Models\Notification;
use Livewire\Component;

class Create extends Component
{
    public $content, $started_at, $ended_at;
    public $open_modal;

    protected $rules = [
        'content' => 'required',
        'started_at' => 'required',
        'ended_at' => 'required',
    ];

    public function render()
    {
        return view('livewire.notification.create');
    }

    public function interactWithModal($action)
    {
         $this->open_modal = $action;
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
        $this->interactWithModal(false);
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Notification Created Successfully!!"
        ]);
        $this->emit('notificationAdded');
        $this->resetInputFields();
    }
}
