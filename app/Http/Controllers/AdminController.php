<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
            ->orderBy('updated_at', 'desc')->paginate(20);

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
            $data = $request->only('title', 'sub_title', 'type', 'image', 'content');
            $data['updated_at'] = now();
            $data['updated_by'] = Auth::user()->email;

            // upload file
            $file = $request->file('file');
            if ($file) {
                // add new file
                $fileName = time() . '_' . $file->getClientOriginalName();
                $destinationPath = public_path() . '/files';
                $file->move($destinationPath, $fileName);
                $data['file'] = "$fileName";

                // remove old file
                if ($request->id) {
                    $oldFile = $post->first()->file ?? '';
                    File::delete("$destinationPath/$oldFile");
                }
            }

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
            return redirect()->back();
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
            DB::transaction(function () use ($data) {
                DB::table('banner')->delete();
                DB::table('banner')->insert($data);
            });
        }
    }

    public function setting(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.setting.index', ['setting' => DB::table('setting')->get()]);
        } else {
            $data = [];
            foreach ($request->name ?? [] as $k => $v) {
                $data[] = [
                    'name' => ($request->name)[$k] ?? null,
                    'content' => ($request->content)[$k] ?? null,
                    'image' => ($request->image)[$k] ?? null
                ];
            }
            DB::transaction(function () use ($data) {
                DB::table('setting')->delete();
                DB::table('setting')->insert($data);
            });
        }
    }

    public function menu(Request $request)
    {
        $reload = false;
        if ($request->isMethod('get')) {
            return view('admin.menu.index', ['menu' => DB::table('menu')->orderBy('order')->get()]);
        } else {
            $reload = DB::transaction(function () use ($request, $reload) {
                // update menu
                foreach ($request->id ?? [] as $k => $id) {
                    $data = [
                        'title' => ($request->title)[$k],
                        'url' => ($request->url)[$k],
                        'icon' => ($request->icon)[$k],
                        'order' => ($request->order)[$k]
                    ];
                    if ($id) {
                        // update
                        DB::table('menu')->where('id', $id)->update($data);
                    } else {
                        // insert
                        DB::table('menu')->insert($data);
                        $reload = true;
                    }
                }
                // delete menu
                DB::table('menu')->whereNotIn('id', $request->id ?? [0])->delete();
                DB::table('submenu')->whereNotIn('menu_id', $request->id ?? [0])->delete();
                return $reload;
            });
        }
        return [
            'reload' => $reload
        ];
    }

    public function submenu(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.menu.sub', [
                'menu' => DB::table('submenu')->where('menu_id', $request->id)->orderBy('order')->get()
            ]);
        } else {
            $data = [];
            foreach ($request->title ?? [] as $k => $v) {
                $data[] = [
                    'menu_id' => $request->id,
                    'title' => ($request->title)[$k],
                    'url' => ($request->url)[$k],
                    'order' => ($request->order)[$k]
                ];
            }
            DB::table('submenu')->where('menu_id', $request->id)->delete();
            DB::table('submenu')->insert($data);
        }
    }
}
