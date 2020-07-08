<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['allCategories']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin'){
            return view('dashboard-admin');
        } else if (Auth::user()->role == 'Cliente'){
            return view('dashboard-customer');
        } else if (Auth::user()->role == 'Tecnico'){
            return view('dashboard-technical');
        }
    }

    public function allCategories()
    {
        $cats = Category::all();
        return view('categories.all_categories')->with('cats', $cats);
    }
}
