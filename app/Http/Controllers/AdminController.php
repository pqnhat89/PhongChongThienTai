<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function logo(Request $request)
    {
        DB::table('logo')->truncate();
        DB::table('logo')->insert([
            'name' => $request->name,
            'slogan' => $request->slogan,
            'description' => $request->description,
            'image' => $request->image
        ]);
    }

    public function carousel(Request $request)
    {
        $data = [];
        foreach ($request->title ?? [] as $k => $v) {
            $data[] = [
                'title' => ($request->title)[$k],
                'description' => ($request->description)[$k],
                'image' => ($request->image)[$k],
                'active' => $request->enabled ? true : false
            ];
        }
        DB::table('carousel')->truncate();
        DB::table('carousel')->insert($data);
    }

    public function team(Request $request)
    {
        $data = [];
        foreach ($request->name ?? [] as $k => $v) {
            $data[] = [
                'name' => ($request->name)[$k],
                'position' => ($request->position)[$k],
                'slogan' => ($request->slogan)[$k],
                'description' => ($request->description)[$k],
                'image' => ($request->image)[$k],
                'active' => $request->enabled ? true : false
            ];
        }
        DB::table('team')->truncate();
        DB::table('team')->insert($data);
    }

    public function postIndex(Request $request)
    {
        return view('admin.post.index');
    }

    public function postUpdate(Request $request)
    {
        $post = DB::table('post')->where('id', $request->id);
        if ($request->isMethod('get')) {
            return view('admin.post.update', ['post' => $post->first()]);
        } else {
            $post->update([
                'title' => $request->title,
                'url' => $request->url,
                'image' => $request->image,
                'content' => $request->content,
                'updated_at' => now(),
                'updated_by' => Auth::user()->email
            ]);
        }
    }

    public function postDelete(Request $request)
    {
        DB::table('post')->where('id', $request->id)->delete();
    }

    public function pageIndex(Request $request)
    {
        return view('admin.post.index');
    }
}
