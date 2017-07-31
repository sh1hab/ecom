<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Products;

class FrontController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        //$shirts=DB::table('products')->limit(4);

        $shirts=Products::all();

        return view('home')->withShirts($shirts);
    }

    public function shirts()
    {
        $tshirts=Products::all();
        return view('shirts')->withTshirts($tshirts);
    }

    public function shirt()
    {
        return view('shirt');
    }

}
