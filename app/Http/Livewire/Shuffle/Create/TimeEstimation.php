<?php

namespace App\Http\Livewire\Shuffle\Create;

use Carbon\Carbon;
use Livewire\Component;

class TimeEstimation extends Component
{
    public $started_at, $ended_at;
    public $estimate_time_in_hours;

    public function render()
    {
        return view('livewire.shuffle.create.time-estimation');
    }

    public function updatedStartedAt()
    {
         $this->estimateTotalTime();
    }

    public function updatedEndedAt()
    {
         $this->estimateTotalTime();
    }

    public function estimateTotalTime()
    {
        $started_at = $this->started_at;
        $ended_at = $this->ended_at;

        if ($started_at && $ended_at) {
            $started_at = Carbon::parse($started_at);
            $ended_at = Carbon::parse($ended_at);

            $this->estimate_time_in_hours = $ended_at->diffInHours($started_at) . ' h';
        } else {
            $this->estimate_time_in_hours = 0 . ' h';
        }
    }
}
