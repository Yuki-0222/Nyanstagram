@extends('layouts.app')

@section('content')
    @if (Auth::check())
         {{ Auth::user()->name }}
    @else
        <div class="background">
            <div class="container description">
                <h1>Nyanstagram</h1>
                <br/>
                <br/>
                <h3>猫の画像を専門に扱ったSNSサイトです。</h2>
                <h3>皆様のお気に入りの猫画像をアップロードしてください。</h3>
    
                <div class="buttons">
                    {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-dark pr-4 pl-4 d-block d-md-inline-block mb-2']) !!}
                    {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-dark pr-4 pl-4 d-block d-md-inline-block mb-2']) !!}
                </div>
            </div>
        </div>
    @endif
   
@endsection