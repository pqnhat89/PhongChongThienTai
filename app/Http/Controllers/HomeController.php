<?php

namespace App\Http\Controllers;

use App\Services\PostServices;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

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
	 * @param Request $request
	 * @return Renderable
	 */
    public function index(Request $request): Renderable
    {
		if (isset($request->s)) {
			$posts = PostServices::getPostBySearch($request->s);
			return view('front-end.index', ['posts' => $posts]);
		}
	    return view('front-end.index');
    }
	
	public function about() {
		return view('front-end.about');
	}
	
	public function structure() {
		return view('front-end.structure');
	}
}
