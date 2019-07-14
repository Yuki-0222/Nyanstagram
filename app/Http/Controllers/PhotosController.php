<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

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
        // バリデーション↓↓
        $this->validate($request, [
            'description' => 'required|max:50',
            'image' => 'required|file|image',
        ]);
    
        // データの受け取り処理↓↓
        //dd($request->file('image')); // ファイル受け取り確認
        $filePath = $request->file('image')->store('public/posts');
        
        $request->user()->photos()->create([
            'description' => $request->description,
            'image' => str_replace('public/', '', $filePath),
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
        
        $id = \Auth::id();
        $user = \Auth::user();
        $photos = $user->photos;

        return view("users.show", ['id' => $id, 'user' => $user, 'photos' => $photos]);
    }
}
