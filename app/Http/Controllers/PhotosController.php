<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Storage;

class PhotosController extends Controller
{

    public function index()
    {
        $data = [];
        
        // ログインユーザーの確認↓↓
        if (\Auth::check()) {
            $user = \Auth::user();
            $photos = $user->feed_photos()->orderBy('created_at', 'desc')->paginate(12);
        
            $data = [
                'user' => $user,
                'photos' => $photos,
                ];
        }
        
        return view('welcome', $data);
    }
    
    public function show($id)
    {
       $photo = Photo::find($id);
       $comments = $photo->comments;
       
       return view('photos.photo_info', ['photo' => $photo, 'comments' => $comments]);
    }
    
    public function create()
    {
        $photo = new Photo;
        
        return view('photos.create', ['photo' => $photo,]);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $this->validate($request, [
            'description' => 'required|max:50',
            'image' => 'required|file|image',
        ]);
    
        // s3アップロード開始
        $image = $request->file('image');
        
        // バケットの`nyanstagram`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('nyanstagram', $image, 'public');
        
        // ファイルパスから参照するURLを生成する
        $url = Storage::disk('s3')->url($path);

        $request->user()->photos()->create([
            'description' => $request->description,
            'image' => $url,
        ]);
        
        // topへ戻る際のphotos受け取り処理↓↓
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $photos = $user->photos()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'photos' => $photos,
                ];
        }
        
        return view('welcome', $data);
    }
    
    public function destroy($id)
    {
        $photo = \App\Photo::find($id);

        if (\Auth::id() === $photo->user_id) {
            $photo->delete();
        }
   
        return redirect()->route('users.show', ['id' => $id]);
    }
    
    public function like_users($id) {
        $data = [];
        $photo = Photo::find($id);
        $like_users = $photo->like_users()->paginate(10);
        
        $data = [
            'photo' => $photo,
            'users' => $like_users,
            ];
        
        return view('photos.like_users', $data);
    }
}
