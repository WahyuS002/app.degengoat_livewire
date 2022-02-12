<?php

namespace App\Http\Livewire\Shuffle;

use App\Models\ParticipantShuffle;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShuffleModal extends Component
{
    public $shuffle;
    public $open_modal = false;

    public function render()
    {
        return view('livewire.shuffle.shuffle-modal');
    }

    public function interactWithModal($action)
    {
         $this->open_modal = $action;
    }

    public function mounted($shuffle)
    {
         $this->shuffle = $shuffle;
    }

    public function makeEveryoneWinners()
    {
        DB::transaction(function() {
            $shuffle_id = $this->shuffle->id;
            $randomized_data = ParticipantShuffle::where('shuffle_id', $shuffle_id)->get();

            $this->shuffled($randomized_data);
        });
    }

    public function shuffled($randomized_data)
    {
        foreach ($randomized_data as $data) {
            $data->update([
                'is_winner' => true
            ]);
        }

        $this->shuffle->update(['status' => 'shuffled']);

        $this->interactWithModal(false);
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Data has been shuffled!!"
        ]);
        $this->emit('refreshData');
    }

    public function shuffleData()
    {
        DB::transaction(function () {
            $randomized_data = ParticipantShuffle::where('shuffle_id', $this->shuffle->id)->get()
                                ->random($this->shuffle->total_winners_amount);

            $this->shuffled($randomized_data);
        });
    }
}
