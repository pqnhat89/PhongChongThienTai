<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\Utils;

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
    public function index(Request $request, $type): Renderable
    {
		$postType = PostType::toArray();
	    $posts = DB::table('post')->where('type', $postType[$type]);
	    if (isset($request->cat_txt)) {
			$search = $request->cat_txt;
		    $posts = $posts->where(function ($w) use ($search) {
				$w->where('title', 'like', '%' . $search . '%')
					->orWhere('sub_title', 'like','%' . $search .'%')
					->orWhere('content', 'like','%' . $search .'%');
		    });
	    }
		$posts = $posts->orderBy('id', 'DESC')->paginate(10);
	    return view('front-end.post.index', ['posts' => $posts, 'type' => mb_strtoupper($postType[$type])]);
    }
	
	/**
	 * @param $id
	 * @return Renderable
	 */
	public function view($id): Renderable
    {
		$totalVisits = Utils::getTotalVisit();
	    $post = DB::table('post')->where('id', $id)->first();
	    $relatedPost = DB::table('post')->where('id', '!=', $id)
		    ->where('type', $post->type)->get();
	    return view('front-end.post.view', ['post' => $post, 'relatedPost' =>$relatedPost]);
    }
	
}
