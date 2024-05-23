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
        Assessment::create([
            'whodid' => $this->whodid,
            'whoreceive' => $this->whoreceive,
            'strength' => $this->strength,
            'toworkon' => $this->toworkon,
            'obs' => $this->obs,
        ]);




        // Optionally, you can emit an event or perform any other actions after submission

        // Clear the form fields
        // $this->reset();
    }

    public function onchange()
    {
        $user = request()->input('user');
        $pass = request()->input('pass');

        $users = UserPublic::leftJoin('assessments', 'user_public.id', '=', 'assessments.whodid')
            ->whereNull('assessments.whodid')
            ->where('user_public.pass', $pass)
            ->where('user_public.name','!=', $user)
            ->select('user_public.id as towho','user_public.name' ,'assessments.*')
            ->get();

        dd($user);
    }


    public function render()
    {
        // $mycoletion = UserPublic::all();
        return view('livewire.Assessmentf');
    }
}
