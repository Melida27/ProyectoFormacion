<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Address;
use App\User;
use App\Municipality;

use Auth;

class AddressController extends Controller
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
        $addresses = Address::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipalities = Municipality::all();
        //$users = User::all();
        return view('users.create')->with($municipalities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address;
        $address->address = $request->address;
        $address->neighborhood = $request->neighborhood;
        $address->fk_municipality = $request->fk_municipality;
        $address->fk_user = $request->fk_user;

        if($address->save()){
            return redirect('users')->with('message', 'La dirección fué adicionada con Éxito!');
        }
    }

    public function storeAddress(Request $request)
    {
        $address = new Address;
        $address->address = $request->address;
        $address->neighborhood = $request->neighborhood;
        $address->fk_municipality = $request->fk_municipality;
        $address->fk_user = $request->fk_user;

        $address->save();

    }

    public function addressAccount(Request $request)
    {
        $address = new Address;
        $address->address = $request->address;
        $address->neighborhood = $request->neighborhood;
        $address->fk_municipality = $request->fk_municipality;
        $address->fk_user = $request->fk_user;

        if($address->save()){
            return redirect('account')->with('message', 'La dirección fué adicionada con Éxito!');
        }
    }

     public function editUserAddress(Request $request)
    {
        $address = new Address;
        $address->address = $request->address;
        $address->neighborhood = $request->neighborhood;
        $address->fk_municipality = $request->fk_municipality;
        $address->fk_user = $request->fk_user;

        if($address->save()){
            $user = User::find($address->fk_user);
            return view('users.edit')->with('user', $user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = Address::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $art = Address::find($id);
        $municipalities = Municipality::all();
        $users = User::all();
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
        $address = Address::find($id);
        $address->address = $request->address;
        $address->neighborhood = $request->neighborhood;
        $address->fk_municipality = $request->fk_municipality;
        $address->fk_user = $request->fk_user;

        $address->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();
    }

    public function getAddress($id)
    {
        //dd($id);
        $addresses = DB::table('address_user')
                            ->select('address_user.id','address_user.address', 'address_user.neighborhood', 'municipalities.name_municipality', 'departments.name_department')
                            ->join('users', 'address_user.fk_user', '=', 'users.id')
                            ->join('municipalities', 'address_user.fk_municipality', '=', 'municipalities.id')
                            ->join('departments', 'municipalities.fk_department', '=', 'departments.id')
                            ->where('users.id', '=', $id)
                            ->get();
        return $addresses;
    }
}
