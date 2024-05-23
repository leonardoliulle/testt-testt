<?php


namespace App\Livewire;

use Livewire\Component;
use app\Models\UserPublic;


class Assessmentf extends Component
{
    public $whodid;
    public $whoreceive;
    public $strength;
    public $toworkon;
    public $obs;
    public $mycoletion = '';
    public $name = "";

    public function submit()
    {
        // Validate input, if necessary

        // Create a new Assessment instance and save it to the database
        // Assessment::create([
        //     'whodid' => $this->whodid,
        //     'whoreceive' => $this->whoreceive,
        //     'strength' => $this->strength,
        //     'toworkon' => $this->toworkon,
        //     'obs' => $this->obs,
        // ]);

        // Optionally, you can emit an event or perform any other actions after submission

        // Clear the form fields
        // $this->reset();
    }


    public function render()
    {
        // $mycoletion = UserPublic::all();
        return view('livewire.assessmentf');
    }
}
