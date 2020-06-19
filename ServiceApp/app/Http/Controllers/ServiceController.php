<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\DB;

use App\Service;
use App\Category;

use Auth;

class ServiceController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(20);
        return view('services.index')->with('services', $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('services.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service = new Service;
        $service->name_service = $request->name_service;
        $service->fk_category = $request->fk_category;

        if($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $service->image = "imgs/".$file;
        }

        if($service->save()){
            return redirect('services')->with('message', 'El servicio fué adicionado con Éxito!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //$id = $request->get("id");
        $query = DB::table('services')
                            ->select('services.name_service', 'services.image', 'categories.name_category','services.created_at','services.updated_at')
                            ->join('categories', 'services.fk_category', '=', 'categories.id')
                            ->where('services.id', '=', $id)
                            ->get();

        //$query = Service::find($id);
        //dd($query);
        return view("services.show", compact("query"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $categories = Category::all();
        return view('services.edit')->with('service', $service)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $service = Service::find($id);
        $service->name_service = $request->name_service;
        $service->fk_category = $request->fk_category;

        if($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $service->image = "imgs/".$file;
        }

        if($service->save()){
            return redirect('services')->with('message', 'El servicio fué modificado con Éxito!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        if($service->delete()){
            return redirect('services')->with('message', 'El servicio fué eliminado con Éxito!');
        }
    }
}
