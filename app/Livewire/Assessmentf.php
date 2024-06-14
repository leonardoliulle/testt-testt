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
    public $name = "";



    public function mount()
    {
        $user = request()->input('i');
        $pass = request()->input('k');
        $wwhoreceive = request()->input('w');

        $this->whodid = $user;
        $this->whoreceive = $wwhoreceive;
        $this->passintern = $pass;

        $mycoletion = UserPublic::leftJoin('assessments', 'user_public.id', '=', 'assessments.whodid')
        // ->whereNull('assessments.whodid')
        ->where('user_public.pass', $this->passintern)
        ->where('user_public.name','!=', $this->whodid)
        ->select('user_public.id as whoreceive','user_public.name' ,'assessments.whodid','assessments.strength','assessments.toworkon','assessments.obs')
        ->get();

        $theonetovaue = UserPublic::leftJoin('assessments', 'user_public.id', '=', 'assessments.whodid')
        // ->whereNull('assessments.whodid')
        ->where('user_public.pass', $this->passintern)
        ->where('user_public.name','!=', $this->whodid)
        ->where('user_public.name','=', $this->whoreceive)
        ->select('user_public.id as whoreceive','user_public.name' ,'assessments.whodid','assessments.strength','assessments.toworkon','assessments.obs')
        ->get();

   


            
            $this->mycoletion = $mycoletion;

            dump($theonetovaue);
        }

    public function onmychange($i = null, $k = null, $w = null)
    {

        // dd($i,$k,$w);
        $user = $i;
        $passintern = $k;
        $wwhoreceive = $w;

        $this->whodid = $i;
        $this->whoreceive = $w;
        $this->passintern = $k;

    //    dd($this->whodid, $this->whoreceive, $this->passintern);

        // DB::enableQueryLog();
        // $queries = DB::getQueryLog();
        // Log::info($queries);
        // dd($passintern, $user);
        $mycoletion = UserPublic::leftJoin('assessments', 'user_public.name', '=', 'assessments.whodid')
            // ->whereNull('assessments.whodid')
            ->where('user_public.pass','=', $this->passintern)
            ->where('user_public.name','!=', $this->whodid)
            // ->where('assessments.whoreceive','=', $this->whoreceive)
            ->select('user_public.id as whoreceive','user_public.name' ,'assessments.whodid','assessments.strength','assessments.toworkon','assessments.obs')
            ->get();

        $this->mycoletion = $mycoletion;
        
        $mydata = UserPublic::leftJoin('assessments', 'user_public.name', '=', 'assessments.whodid')
        // ->whereNull('assessments.whodid')
        ->where('user_public.pass','=', $this->passintern)
        ->where('user_public.name','!=', $this->whodid)
        ->where('assessments.whoreceive','=', $this->whoreceive)
        ->select('user_public.id as whoreceive','user_public.name as whodid' ,'assessments.strength','assessments.toworkon','assessments.obs')
        ->get();

        $this->mydata = $mydata;

        // dd($this->mydata);
        
    // Check if a record already exists with the same whodid and whoreceive
    $existingRecord = Assessment::where('whodid', $i)
                                ->where('whoreceive', $w)
                                ->first();

    if ($existingRecord) {
            // Update the existing record
            $existingRecord->update([
                'strength' => $this->strength,
                'toworkon' => $this->toworkon,
                'obs' => $this->obs,
            ]);
    } else {
        // Create a new record
        $data = [
            'whodid' => $i,
            'whoreceive' => $w,
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
