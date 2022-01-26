<?php

namespace App\Http\Livewire\VoteProgram;

use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $program_name, $program_description;

    public $title, $description, $image;

    public $inputs = [];
    public $i = 0;

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        return view('livewire.vote-program.create');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->phone = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'title.0' => 'required',
            'description.0' => 'nullable',
            'image.0' => 'required|mimes:jpg,jpeg,png|max:2048',
            'title.*' => 'required',
            'description.*' => 'nullable',
            'image.*' => 'required|mimes:jpg,jpeg,png|max:2048',
        ],
        [
            'title.0.required' => 'Title field is required',
            'image.0.required' => 'Image field is required',
            'image.0.mimes' => 'File type must jpg, jpeg, png',
            'image.0.max' => 'Max size is 2MB',
            'title.*.required' => 'Title field is required',
            'image.*.required' => 'Image field is required',
            'image.*.mimes' => 'File type must jpg, jpeg, png',
            'image.*.max' => 'Max size is 2MB',
            ]
        );
    }
}
