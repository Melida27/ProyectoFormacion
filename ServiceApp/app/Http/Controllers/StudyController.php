<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Study;
use App\Curriculum;
use App\User;

use Auth;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studies = DB::table('study')
            ->select('study.id', 'study.institution','study.type', 'study.title', 'study.end_date', 'study.description', 'study.fk_curriculum')
            ->join('curriculum', 'study.fk_curriculum', '=', 'curriculum.id')
            ->join('users', 'curriculum.fk_user', '=', 'users.id')
            ->where('users.id', '=', Auth::user()->id)
            ->paginate(4);

        //dd($studies);
        return view('studies.index')->with('studies', $studies);
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
        $study = new Study;
        $study->fk_curriculum = $request->fk_curriculum;
        $study->institution = $request->institution;
        $study->type = $request->type;
        $study->title = $request->title;
        $study->end_date = $request->end_date;
        $study->description = $request->description;
        
        $study->save();
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
        $study = Study::find($id);

        if($study->delete()){
            return redirect('/studies')->with('message', 'El estudio ha sido eliminado con éxito');
        }
    }
}
