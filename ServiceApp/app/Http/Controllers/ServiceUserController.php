<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\ServiceUser;
use App\Service;
use App\User;
use App\Curriculum;
use Auth;

class ServiceUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('curriculum.create_curriculum')->with('services', $services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function allservices(){
        $services = Service::all();
        return $services;
    }

    public function technicalsbyservice($id){
        $technicals = DB::table('user_service')
        ->select('users.id', 'users.first_name', 'users.first_lastname','users.photo','users.phone','users.email','curriculum.id as id_curriculum')
        ->join('users', 'user_service.fk_user', '=', 'users.id')
        ->join('curriculum', 'curriculum.fk_user', '=', 'users.id')
        ->where('user_service.fk_service', '=', $id)
        ->get();

        return view('users.technical.technicalsbyservice')->with('technicals', $technicals);
    }

    public function infoCompletedTechnical($id){

        $curriculum = Curriculum::find($id); 
        $userInfo = User::find($curriculum->fk_user); 
        $studies =  DB::table('study')->where('fk_curriculum', '=', $id)->get();
        $experiences =  DB::table('working_experience')->where('fk_curriculum', '=', $id)->get();
        $curriculumArray = array('technical_info'=>$userInfo); 
        $userInfoArray = array('curriculum'=>$curriculum); 
        $studiesArray = array('studies'=>$studies); 
        $experiencesArray = array('experiences'=>$experiences); 
        $technical = $userInfoArray + $curriculumArray + $studiesArray + $experiencesArray;

        return $technical;
    }
}
