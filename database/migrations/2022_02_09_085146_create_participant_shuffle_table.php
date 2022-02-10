<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantShuffleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant_shuffle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('participant_id')->constrained();
            $table->foreignId('shuffle_id')->constrained();
            $table->integer('position');
            $table->boolean('is_winner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participant_shuffle');
    }
}
