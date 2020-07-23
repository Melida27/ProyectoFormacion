<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Order;
use Auth;
use DateTime;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('fk_technical','=',Auth::user()->id)->orderBy('id', 'DESC')->paginate(4);
        return view('users.technical.orders')->with('orders', $orders);
    }

    public function ordersCustomer() {
        $orders = Order::where('fk_user','=',Auth::user()->id)->orderBy('id', 'DESC')->paginate(6);
        return view('users.customer.orders-customer')->with('orders', $orders);
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
        $date = new DateTime('today');
        $order = new Order;
        $order->date_order = $date;
        $order->date_service = null;
        $order->status_order = 'Pendiente';
        $order->fk_user = $request->fk_user;
        $order->fk_technical = $request->fk_technical;
        $order->fk_service = $request->fk_service;
        $order->fk_address = $request->fk_address;
        $order->description = $request->description;
        $order->fk_score = '1';

        $order->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = DB::table('orders')
                        ->select('orders.date_order','orders.date_service', 'orders.status_order','orders.description as order_description','users1.identification_user as client_identification','users1.first_name as client_first_name','users1.second_name as client_second_name','users1.first_lastname as client_first_lastname','users1.second_lastname as client_second_lastname','users1.email as client_email','users1.phone as client_phone','services.name_service','services.description','address_user.address','address_user.neighborhood','score.score','users2.identification_user','users2.first_name','users2.second_name','users2.first_lastname','users2.second_lastname','users2.email','users2.phone','municipalities.name_municipality as client_municipality')
                        ->join('users as users1', 'orders.fk_user', '=', 'users1.id')
                        ->join('services', 'orders.fk_service', '=', 'services.id')
                        ->join('address_user', 'orders.fk_address', '=', 'address_user.id')
                        ->join('score', 'orders.fk_score', '=', 'score.id')
                        ->join('users as users2', 'orders.fk_technical', '=', 'users2.id')
                        ->join('municipalities', 'address_user.fk_municipality', '=', 'municipalities.id')
                        ->where('orders.id', '=', $id)
                        ->get();

       return $order;
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

    public function updateStatusOrder(Request $request, $id){
        $order = Order::find($id);
        $order->status_order = $request->value;
        $order->save();
    }

    public function updateStatusOrderRedirect(Request $request){
        $order = Order::find($request->id_order);
        $order->status_order = $request->value;

        if($order->save()) {
            return redirect('orders-customer')->with('message', 'La orden ha sido cancelada con éxito');
        }
    }

    public function updateDateServiceOrder(Request $request, $id){
        $order = Order::find($id);
        $order->status_order = $request->value;
        $order->date_service = $request->date;
        $order->save();
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
