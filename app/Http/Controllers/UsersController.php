<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;

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
        $photos = $user->photos()->orderBy('created_at', 'desc')->paginate(12);
        
        $data = [
            'user' => $user,
            'photos' => $photos,
        ];
        
        $data += $this->counts($user);

        return view('users.show', $data);
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'profile' => 'required|max:191',
            'user_image' => 'file|image|mimes:jpeg,png,jpg',
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile = $request->profile;
        
        
        // 画像ファイルの有無を確認
        $user_image = $request->file('user_image');
        
        if ($user_image) {
            
            // バケットの`nyanstagram`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('nyanstagram', $user_image, 'public');
            
            // ファイルパスから参照するURLを生成する
            $url = Storage::disk('s3')->url($path);
            
            // user_imageカラムに、画像のURLを保存
            $user->user_image = $url;
            
        }
        $user->save();
    
        return redirect('/');
    }
    
    public function destroy($id)
    {
        $message = User::find($id);
        $message->delete();

        return redirect('/');
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function likes($id)
    {
        $user = User::find($id);
        $likes = $user->likes()->orderBy('created_at', 'desc')->paginate(12);
        
        $data = [
            'user' => $user,
            'photos' => $likes,
        ];
        
        return view('users.likes', $data);
    }
}
