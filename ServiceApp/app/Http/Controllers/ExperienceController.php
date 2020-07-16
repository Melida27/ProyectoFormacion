<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Experience;
use App\Curriculum;
use App\User;

use Auth;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = DB::table('working_experience')
                        ->select('working_experience.id', 'working_experience.company_name', 'working_experience.position', 'working_experience.time_experience_company', 'working_experience.description', 'working_experience.fk_curriculum')
                        ->join('curriculum', 'working_experience.fk_curriculum', '=', 'curriculum.id')
                        ->join('users', 'curriculum.fk_user', '=', 'users.id')
                        ->where('users.id', '=', Auth::user()->id)
                        ->paginate(4);

        //dd($experiences);
        return view('experiences.index')->with('experiences', $experiences);
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
        $experience = new Experience;
        $experience->company_name = $request->company_name;
        $experience->position = $request->position;
        $experience->time_experience_company = $request->time_experience_company;
        $experience->description = $request->description;
        $experience->fk_curriculum = $request->fk_curriculum;

        $experience->save();
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
        $experience = Experience::find($id);

        if($experience->delete()){
            return redirect('/experiences')->with('message', 'La experiencia fué eliminada con éxito!');
        }
    }
}
