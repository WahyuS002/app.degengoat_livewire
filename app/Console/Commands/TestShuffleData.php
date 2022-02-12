<?php

namespace App\Console\Commands;

use App\Models\Participant;
use App\Models\ParticipantShuffle;
use Illuminate\Console\Command;

class TestShuffleData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'factory:shuffle';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make fake data for testing shuffle.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Participant::factory()->count(5)->create();
        $counters = Participant::limit(5)->pluck('id')->toArray();
        foreach ($counters as $counter) {
            ParticipantShuffle::factory()->create([
                'participant_id' => $counter,
                'shuffle_id' => 1,
                'discord_username' => 'discord',
                'twitter_username' => 'twitter'
            ]);
        }

    }
}
