<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShuffleParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shuffle_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shuffle_id')->constrained();
            $table->string('discord_username');
            $table->string('twitter_username');
            $table->string('wallet_address');
            $table->ipAddress('ip_address');
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
        Schema::dropIfExists('shuffle_participants');
    }
}
