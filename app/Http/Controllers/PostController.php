<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Services\PostServices;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
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
	 *
	 * @param $type
	 * @return Renderable
	 */
    public function index($type): Renderable
    {
		$postType = PostType::toArray();
	    $posts = DB::table('post')->where('type', $postType[$type])->orderBy('id', 'DESC')->paginate(10);
	    return view('front-end.post.index', ['posts' => $posts, 'type' => mb_strtoupper($postType[$type])]);
    }
	
	/**
	 * @param $id
	 * @return Renderable
	 */
	public function view($id): Renderable
    {
	    $post = DB::table('post')->where('id', $id)->first();
	    $relatedPost = DB::table('post')->where('id', '!=', $id)
		    ->where('type', $post->type)->get();
	    return view('front-end.post.view', ['post' => $post, 'relatedPost' =>$relatedPost]);
    }
	
}
