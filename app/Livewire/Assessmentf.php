<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserPublic;
use App\Models\Assessment;
use Illuminate\Support\Facades\DB;

class Assessmentf extends Component
{

    public $whodid;
    public $whoreceive;
    public $strength;
    public $toworkon;
    public $obs;
    public $mycoletion;
    public $name = "";



    public function mount()
    {
        $user = request()->input('user');
        $pass = request()->input('pass');

        $mycoletion = UserPublic::leftJoin('assessments', 'user_public.id', '=', 'assessments.whodid')
            ->whereNull('assessments.whodid')
            ->where('user_public.pass', $pass)
            ->where('user_public.name','!=', $user)
            ->select('user_public.id as whoreceive','user_public.name' ,'assessments.whodid','assessments.strength','assessments.toworkon','assessments.obs')
            ->get();

        $this->mycoletion = $mycoletion;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'whodid' => 'required|string|max:255',
            'whoreceive' => 'required|string|max:255',
            'strength' => 'required|string|max:255',
            'toworkon' => 'required|string|max:255',
            'obs' => 'nullable|string',
        ]);

        $this->saveData();
    }

    public function render()
    {
        return view('livewire.assessmentf');
    }

    public function onmychange()
    {
        $data = [
            'whodid' => $this->whodid,
            'whoreceive' => $this->whoreceive,
            'strength' => $this->strength,
            'toworkon' => $this->toworkon,
            'obs' => $this->obs,
        ];

        Assessment::create($data);

    }

    public function saveData()
    {
        $data = [
            'whodid' => $this->whodid,
            'whoreceive' => $this->whoreceive,
            'strength' => $this->strength,
            'toworkon' => $this->toworkon,
            'obs' => $this->obs,
        ];

        if ($this->assessmentId) {
            $assessment = Assessment::find($this->assessmentId);
            $assessment->update($data);
        } else {
            Assessment::create($data);
        }

        session()->flash('message', 'Assessment updated successfully.');
    }
}
