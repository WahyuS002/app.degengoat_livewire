<?php

namespace App\Http\Livewire\Shuffle;

use App\Models\Shuffle;
use Carbon\Carbon;
use LivewireUI\Modal\ModalComponent;

class CreateModal extends ModalComponent
{
    public $title, $price, $total_winners_amount, $started_at, $ended_at;

    protected $rules = [
        'title' => 'required|min:6',
        'price' => 'required|numeric',
        'total_winners_amount' => 'required|numeric',
        'started_at' => 'required',
        'ended_at' => 'required',
    ];

    public function render()
    {
        return view('livewire.shuffle.create-modal');
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
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Shuffle Created Successfully!!"
        ]);
        $this->emit('refreshData');
        $this->resetInputFields();
    }
}
