<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Curriculum;
use App\Study;
use App\ServiceUser;
use App\Experience;
use App\User;

use Auth;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(count($request->fk_service));

        $user = User::find(Auth::user()->id);
        $user->identification_user = $request->identification_user;
        $user->first_name = $request->first_name;
        $user->second_name = $request->second_name;
        $user->first_lastname = $request->first_lastname;
        $user->second_lastname = $request->second_lastname;
        $user->birthdate = $request->birthdate;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->civil_status = $request->civil_status;
        $user->save();

        try {
            $curriculum = new Curriculum;
            $curriculum->experience = $request->experience;
            $curriculum->fk_user = $request->fk_user;
            $curriculum->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/curriculum')->with('error', 'Error al Adicionar la hoja de vida');
        }

        try {
            for ($i=0; $i < count($request->fk_service); $i++) { 
                $userservice = new ServiceUser;
                $userservice->fk_user = $request->fk_user;
                $userservice->fk_service = $request->fk_service[$i];
                $userservice->save();
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $curriculum->delete($curriculum->id);
            return redirect('/curriculum')->with('error', 'Error al Adicionar la hoja de vida');
        }

        try {
            $study = new Study;
            $study->type = $request->type;
            $study->title = $request->title;
            $study->end_date = $request->end_date;
            $study->description = $request->description;
            $study->fk_curriculum = $curriculum->id;
            $study->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $curriculum->delete($curriculum->id);
            $userservice->delete($userservice->id);
            return redirect('/curriculum')->with('error', 'Error al Adicionar la hoja de vida');
        }

        try {
            $experience = new Experience;
            $experience->company_name = $request->company_name;
            $experience->position = $request->position;
            $experience->time_experience_company = $request->time_experience_company;
            $experience->description = $request->description_experience;
            $experience->fk_curriculum = $curriculum->id;
            $experience->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $study->delete($study->id);
            $curriculum->delete($curriculum->id);
            $userservice->delete($userservice->id);
            return redirect('/curriculum')->with('error', 'Error al Adicionar la hoja de vida');
        }

        return redirect('/home')->with('message', 'Los datos fueron adicionados con éxito');
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
}
