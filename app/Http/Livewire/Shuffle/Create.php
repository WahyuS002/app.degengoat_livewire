<?php

namespace App\Http\Livewire\Shuffle;

use App\Models\Shuffle;
use Livewire\Component;

class Create extends Component
{
    public $title, $price, $started_at, $ended_at;
    public $open_modal = false;

    protected $rules = [
        'title' => 'required|min:6',
        'price' => 'required',
        'started_at' => 'required',
        'ended_at' => 'required',
    ];

    public function interactWithModal($action)
    {
         $this->open_modal = $action;
    }

    public function render()
    {
        return view('livewire.shuffle.create');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetInputFields()
    {
         $this->title = '';
         $this->price = '';
         $this->started_at = '';
         $this->ended_at = '';
    }

    public function store()
    {
        $validatedData = $this->validate();

        Shuffle::create($validatedData);
        $this->interactWithModal(false);
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Category Created Successfully!!"
        ]);
        $this->resetInputFields();
    }
}
