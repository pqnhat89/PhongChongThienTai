<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front-end.index');
    }
	
	public function about() {
		return view('front-end.about');
	}
	
	public function structure() {
		return view('front-end.structure');
	}
}
