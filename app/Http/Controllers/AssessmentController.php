<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\UserPublic;
use Illuminate\Http\Request;


class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Assessment $assessment, Request $request)
    {
        // $user = $request->input('i');
        // $pass = $request->input('k');
        // $wwhoreceive = $request->input('w');

        echo view('assessments/aheader');
        echo view('assessments/assessment-form');
        // $user = request()->input('user');
        // $pass = request()->input('pass');


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assessment $assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assessment $assessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assessment $assessment)
    {
        //
    }

    public function getin(Request $request)
    {   
        // if ($request->isMethod('post')) {
            // $name = $request->input('name');
            // $pass = $request->input('pass');
            // return redirect(route('assessment.feedbackloop'))->with($name, $pass);
        // } elseif ($request->isMethod('get')) {
            echo view('assessments.getin');
        // }
    }

    public function feedbackloop(Request $request, $i = null, $k = null, $w = null)
    {


        $user = base64_decode($request->input('i')) ? base64_decode($request->input('i')) : $request->input('whodid');
        $passintern = base64_decode($request->input('k')) ? base64_decode($request->input('k')) : $request->input('pass');
        $wwhoreceive = base64_decode($request->input('w')) ? base64_decode($request->input('w')) : $request->input('whoreceive');

        // dd($user, $passintern, $wwhoreceive);
        // $user = $request->input('whodid') ? $request->input('whodid') : base64_decode($i);
        // $passintern = $request->input('pass') ? $request->input('pass') : base64_decode($k);
        // $wwhoreceive = base64_decode($w);

        if (!empty($wwhoreceive) and $request->isMethod('get')) {
            $valoresforms = Assessment::where('pass', $passintern)
            ->where('whodid', $user)
            ->where('whoreceive', $wwhoreceive)->get()->toArray();
            if (!empty($valoresforms) && array_key_exists(0, $valoresforms)) {
                $valoresforms = $valoresforms[0];
            } else {
                $valoresforms['strength'] = null;
                $valoresforms['toworkon'] = null;
                $valoresforms['obs'] = null;
            }

        } 
        
        $this->strength = isset($valoresforms['strength']) ? $valoresforms['strength'] : $request->input('strength');
        $this->toworkon = isset($valoresforms['toworkon']) ? $valoresforms['toworkon'] : $request->input('toworkon');
        $this->obs = isset($valoresforms['obs']) ? $valoresforms['obs'] : $request->input('obs');    
        

        $this->saveuser($user, $passintern);

        $this->whodid = $user;
        $this->passintern = $passintern;
        $this->whoreceive = $wwhoreceive;

        $mycoletion = UserPublic::leftJoin('assessments', function($join) {
            $join->on('user_public.id', '=', 'assessments.whoreceive')
                 ->where('assessments.whodid', '=', $this->whodid)
                 ->orWhereNull('assessments.whoreceive');
        })
        ->select('user_public.id as whoreceive', 'user_public.name', 'user_public.pass', 'assessments.whodid', 'assessments.whoreceive as checktrue', 'assessments.pass', 'assessments.strength','assessments.toworkon')
        ->where('user_public.name', '<>', $this->whodid)
        ->where('user_public.pass', '=', $this->passintern)
        ->get();

        // dd($mycoletion); 

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

        
        $id = UserPublic::where('user_public.pass', $this->passintern)
        ->where('user_public.name','=', $this->whodid)
        ->pluck('id')->toArray();

        // dd($id[0]);

        $myresults = UserPublic::leftJoin('assessments', 'user_public.name', '=', 'assessments.whodid')
        ->where('assessments.whoreceive','=', $id[0])
        ->select('assessments.whoreceive as whoreceive','user_public.name' ,'assessments.whodid','assessments.strength','assessments.toworkon','assessments.obs')
        ->distinct()
        ->take($this->numerador)
        ->get()->toArray();

        $this->myresults = $myresults;

        
    // Check if a record already exists with the same whodid and whoreceive
    $existingRecord = Assessment::where('whodid', $this->whodid)
                                ->where('whoreceive', $this->whoreceive)
                                ->where('pass', $this->passintern)
                                ->first();

        // dd($existingRecord);
    if ($this->whoreceive != NULL) {
        if ($existingRecord) {
            // Update the existing record
            // dd($existingRecord);
            $existingRecord->update([
                'pass' => $this->passintern,
                'strength' => $this->strength,
                'toworkon' => $this->toworkon,
                'obs' => $this->obs,
            ]);
        } else {
            // Create a new record
            $data = [
                'whodid' => $this->whodid,
                'whoreceive' => $this->whoreceive,
                'pass' => $this->passintern,
                'strength' => $this->strength,
                'toworkon' => $this->toworkon,
                'obs' => $this->obs,
            ];
            
            Assessment::create($data);
        } 
            
    }   
        echo view('assessments/aheader');       
        echo view('assessments/feedbackloop', ['whodid' => $this->whodid, 
                        'passintern' => $this->passintern, 
                        'whoreceive' => $this->whoreceive, 
                        'strength' => $this->strength,
                        'toworkon' => $this->toworkon,
                        'obs' => $this->obs,
                        'denominador' => $this->denominador,
                        'numerador' => $this->numerador,
                        'myresults' => $this->myresults,
                        'mydata' => $this->mydata,
                        'mycoletion' => $this->mycoletion, 
                    ]);
    

    } 

    protected function saveuser($user, $pass)
    {
                // dd($name, $pass);
        // dd($request);
        // Check if a record already exists with the same whodid and whoreceive
        $existingRecord = Userpublic::where('name', $user)
            ->where('pass', $pass)
            ->first();

        
        if (!$existingRecord and $user != null) {
            $data = [
            'name' => $user,
            'pass' => $pass,
            ];

            return Userpublic::create($data);
        } 

        return false;
    }
}
