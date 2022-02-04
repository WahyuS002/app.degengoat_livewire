<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShuffleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'price' => $this->price,
            'total_winners_amount' => $this->total_winners_amount,
            'total_participants' => $this->countShuffleParticipants(),
            'status' => $this->status,
            'started_at' => $this->started_at,
            'ended_at' => $this->ended_at,
        ];
    }
}
