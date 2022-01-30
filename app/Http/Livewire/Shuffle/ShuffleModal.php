<?php

namespace App\Http\Livewire\Shuffle;

use App\Models\Shuffle;
use App\Models\ShuffleParticipant;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShuffleModal extends Component
{
    public $shuffle;
    public $winner_amount;
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
            $randomized_data = $this->shuffle->shuffleParticipants()->get()->random($this->shuffle->shuffleParticipants->count());

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
        $this->emit('shuffledData');
    }

    public function shuffleData()
    {
        if ($this->winner_amount > $this->shuffle->shuffleParticipants->count()) {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Winner amount greater than participants."
            ]);
        } else {
            DB::transaction(function () {
                $randomized_data = ShuffleParticipant::where('shuffle_id', $this->shuffle->id)->get()
                                    ->random($this->winner_amount);

                $this->shuffled($randomized_data);
            });
        }
    }
}
