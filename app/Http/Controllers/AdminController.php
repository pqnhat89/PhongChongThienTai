<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
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

    /**
     * POST
     */
    public function postIndex(Request $request)
    {
        // init conditions
        $conditions = [];

        // get condition
        if ($request->title) {
            $conditions[] = [
                'title', 'like', '%' . $request->title . '%'
            ];
        }
        if ($request->type) {
            $conditions[] = [
                'type', '=', $request->type
            ];
        }

        // query
        $post = DB::table('post')->where($conditions)
            ->orderBy('updated_at', 'desc')->simplePaginate(20);

        return view('admin.post.index', [
            'post' => $post
        ]);
    }

    public function postUpdate(Request $request)
    {
        $post = DB::table('post')->where('id', $request->id);
        if ($request->isMethod('get')) {
            return view('admin.post.update', ['post' => $post->first()]);
        } else {
            $data = [
                'title' => $request->title,
                'type' => $request->type,
                'image' => $request->image,
                'content' => $request->content,
                'updated_at' => now(),
                'updated_by' => Auth::user()->email
            ];
            if ($request->id) {
                $post->update($data);
            } else {
                DB::table('post')->insert(
                    array_merge($data, [
                        'created_at' => now(),
                        'created_by' => Auth::user()->email
                    ])
                );
            }
        }
    }

    public function postDelete(Request $request)
    {
        DB::table('post')->where('id', $request->id)->delete();
    }

    /**
     * USER
     */
    public function userIndex(Request $request)
    {
        $user = DB::table('users');

        if (UserRole::isAdmin()) {
            $user = $user->where('role', UserRole::ADMIN);
        }

        // get condition
        if ($request->emailorname) {
            $user = $user->where(function ($w) use ($request) {
                $w->where('name', 'like', '%' . $request->emailorname . '%')
                    ->orWhere('email', 'like', '%' . $request->emailorname . '%');
            });
        }

        // query
        $user = $user->orderBy('id')->simplePaginate(20);

        return view('admin.user.index', [
            'user' => $user
        ]);
    }

    public function userUpdate(Request $request)
    {
        $authUser = auth()->user();
        // validation role
        if (
            (UserRole::isAdmin())
            && ($authUser->id != $request->id)
        ) {
            return response('Người dùng không có quyền!', 400);
        }

        $user = DB::table('users')->where('id', $request->id);
        if ($request->isMethod('get')) {
            return view('admin.user.update', ['user' => $user->first()]);
        } else {
            // validation
            if (!Hash::check($request->currentpassword, $authUser->password)) {
                return response('Xác nhận: Nhập mật khẩu hiện tại của bạn không chính xác!', 400);
            }

            // update
            $data = [
                'name' => $request->name,
                'updated_at' => now(),
                'updated_by' => $authUser->email
            ];
            if ($request->newpassword) {
                $data['password'] = bcrypt($request->newpassword);
            }
            if ($request->id) {
                $user->update($data);
            } else {
                // validation
                if (!$request->email) {
                    return response('Vui lòng nhập Email!', 400);
                }
                if (!$request->newpassword) {
                    return response('Vui lòng nhập Password!', 400);
                }

                // insert
                DB::table('users')->insert(
                    array_merge($data, [
                        'email' => $request->email,
                        'created_at' => now(),
                        'created_by' => Auth::user()->email
                    ])
                );
            }
        }
    }

    public function userDelete(Request $request)
    {
        // validation role
        if (UserRole::isAdmin()) {
            return response('Người dùng không có quyền!', 400);
        }
        $user = DB::table('users')->where('id', $request->id);
        if ($user->first()->role == UserRole::SUPPER) {
            return response('Người dùng không có quyền!', 400);
        }
        $user->delete();
    }

    public function banner(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.banner.index', ['banner' => DB::table('banner')->get()]);
        } else {
            $data = [];
            foreach ($request->title ?? [] as $k => $v) {
                $data[] = [
                    'title' => ($request->title)[$k],
                    'description' => ($request->description)[$k],
                    'image' => ($request->image)[$k]
                ];
            }
            DB::table('banner')->truncate();
            DB::table('banner')->insert($data);
        }
    }
}
