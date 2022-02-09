<?php

namespace App\Http\Livewire\Shuffle;

use App\Models\Shuffle;
use Livewire\Component;

class Table extends Component
{
    public $shuffles;

    protected $listeners = [
        'refreshData' => 'refreshData',
    ];

    public function mount()
    {
        $this->shuffles = Shuffle::withCount('shuffleParticipants')->latest()->get();
    }

    public function refreshData()
    {
        $this->shuffles = Shuffle::withCount('shuffleParticipants')->latest()->get();
    }

    public function render()
    {
        return view('livewire.shuffle.table');
    }

    public function updateStatus($id, $status)
    {
         Shuffle::find($id)->update([
             'status' => $status
         ]);

         $this->refreshData();
    }
}
