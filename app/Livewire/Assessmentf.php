<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UserPublic;
use App\Models\Assessment;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use Carbon\Carbon;



class Assessmentf extends Component
{

    public $whodid;
    public $whoreceive;
    public $passintern;
    public $strength;
    public $toworkon;
    public $obs;
    public $mycoletion;
    public $mydata;
    public $myresults;
    public $name = "";
    public $numerador = 0;
    public $denominador = 0;



    public function mount()
    {
        $user = request()->input('i');
        $pass = request()->input('k');
        $wwhoreceive = request()->input('w');

        $this->whodid = $user;
        $this->whoreceive = $wwhoreceive;
        $this->passintern = $pass;

        // $mycoletion = UserPublic::where('pass', $this->passintern)
        // ->where('name', '!=', $this->whodid)
        // ->select('id as whoreceive', 'name')
        // ->get();

        $mycoletion = UserPublic::leftJoin('assessments', function($join) {
            $join->on('user_public.id', '=', 'assessments.whoreceive')
                 ->where('assessments.whodid', '=', $this->whodid)
                 ->orWhereNull('assessments.whoreceive');
        })
        ->select('user_public.id as whoreceive', 'user_public.name', 'user_public.pass', 'assessments.whodid', 'assessments.whoreceive as checktrue', 'assessments.pass', 'assessments.strength','assessments.toworkon')
        ->where('user_public.name', '<>', $this->whodid)
        ->where('user_public.pass', '=', $this->passintern)
        ->get();

        $this->numerador = Assessment::where('whodid', $this->whodid)
                                        ->where('pass','=', $this->passintern)
                                        ->where('strength','!=', '')
                                        ->where('toworkon','!=', '')
                                        ->whereNotNull('strength')
                                        ->whereNotNull('toworkon')
                                        ->count();

        $this->denominador = Userpublic::where('name','!=', $this->whodid)
                                        ->where('pass', $this->passintern)
                                        ->count();

        $theonetovalue = UserPublic::leftJoin('assessments', 'user_public.name', '=', 'assessments.whodid')
        // ->whereNull('assessments.whodid')
        // ->where('user_public.pass','=', $this->passintern)
        ->where('assessments.whodid','=', $this->whodid)
        ->where('assessments.whoreceive','=', (int)$this->whoreceive)
        ->select('assessments.whoreceive as whoreceive','user_public.name' ,'assessments.whodid','assessments.strength','assessments.toworkon','assessments.obs')
        ->get()->toArray();

        $this->mycoletion = $mycoletion;

       
        if (!empty($theonetovalue)) {

            $this->strength = $theonetovalue[0]['strength'];
            $this->toworkon = $theonetovalue[0]['toworkon'];
            $this->obs = $theonetovalue[0]['obs'];
        }

        // dump($this->passintern, $this->whodid);
        
        $id = UserPublic::where('user_public.pass', $this->passintern)
        ->where('user_public.name','=', $this->whodid)
        ->pluck('id')->toArray();

        // dump($id[0]);

        $myresults = UserPublic::leftJoin('assessments', 'user_public.name', '=', 'assessments.whodid')
        ->where('assessments.whoreceive','=', $id[0])
        ->select('assessments.whoreceive as whoreceive','user_public.name' ,'assessments.whodid','assessments.strength','assessments.toworkon','assessments.obs')
        ->take($this->numerador)
        ->get()->toArray();

        $this->myresults = $myresults;

        // dump($this->myresults);

            
        }

    public function onmychange($i = null, $k = null, $w = null)
    {

        $user = $i;
        $passintern = $k;
        $wwhoreceive = $w;

        $this->whodid = $i;
        $this->whoreceive = $w;
        $this->passintern = $k;

        $mycoletion = UserPublic::leftJoin('assessments', function($join) {
            $join->on('user_public.id', '=', 'assessments.whoreceive')
                 ->where('assessments.whodid', '=', $this->whodid)
                 ->orWhereNull('assessments.whoreceive');
        })
        ->select('user_public.id as whoreceive', 'user_public.name', 'user_public.pass', 'assessments.whodid', 'assessments.whoreceive as checktrue', 'assessments.pass', 'assessments.strength','assessments.toworkon')
        ->where('user_public.name', '<>', $this->whodid)
        ->where('user_public.pass', '=', $this->passintern)
        ->get();

        $this->mycoletion = $mycoletion;

        $this->numerador = Assessment::where('whodid', $this->whodid)
                                        ->where('pass', $this->passintern)
                                        ->where('strength','!=', '')
                                        ->where('toworkon','!=', '')
                                        ->whereNotNull('strength')
                                        ->whereNotNull('toworkon')
                                        ->count();

        $this->denominador = Userpublic::where('name','!=', $this->whodid)
                                        ->where('pass', $this->passintern)
                                        ->count();

  
        
        $mydata = UserPublic::leftJoin('assessments', 'user_public.name', '=', 'assessments.whodid')
        // ->whereNull('assessments.whodid')
        ->where('user_public.pass','=', $this->passintern)
        ->where('user_public.name','!=', $this->whodid)
        ->where('assessments.whoreceive','=', $this->whoreceive)
        ->select('user_public.id as whoreceive','user_public.name as whodid' ,'assessments.strength','assessments.toworkon','assessments.obs')
        ->take($this->numerador)
        ->get();

        $this->mydata = $mydata;

        // dd($this->mydata);
        
    // Check if a record already exists with the same whodid and whoreceive
    $existingRecord = Assessment::where('whodid', $i)
                                ->where('whoreceive', $w)
                                ->where('pass', $this->passintern)
                                ->first();

        // dd($this->passintern);

    if ($existingRecord) {
            // Update the existing record
            $existingRecord->update([
                'pass' => $this->passintern,
                'strength' => $this->strength,
                'toworkon' => $this->toworkon,
                'obs' => $this->obs,
            ]);
    } else {
        // Create a new record
        $data = [
            'whodid' => $i,
            'whoreceive' => $w,
            'pass' => $this->passintern,
            'strength' => $this->strength,
            'toworkon' => $this->toworkon,
            'obs' => $this->obs,
        ];

        Assessment::create($data);

    } 

    }

    public function render()
    {
        return view('livewire.assessmentf');
    }



    public function saveData()
    {
        $data = [
            'whodid' => $this->whodid,
            'pass' => $this->passintern,
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
