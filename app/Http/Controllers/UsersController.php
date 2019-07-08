<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // 追加
use Illuminate\Support\Facades\Storage; // 追加

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', [
            'user' => $user,
        ]);
    }
    
    // getでmessages/id/editにアクセスされた場合の「更新画面表示」
    public function edit($id)
    {
        $user = User::find($id);
        
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    // putまたはpatchでmessages/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'profile' => 'required|max:191',
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile = $request->profile;
        //dd($request->file('user_image')); // 確認する
        
        // 画像ファイルを保存
        $file = $request->file('user_image');
        //Storage::put('public/icons', $file);
        $filePath = $file->store('public/icons');
        $user->user_image = str_replace('public/', '', $filePath);
        $user->save();

        return view('users.show', [
            'user' => $user,
        ]);
    }
}
