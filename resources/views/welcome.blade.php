@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="background_after_login">
            <div class="container pt-4">
                <div class="row">
                    <div class="col-3">
                        @if(Auth::user()->user_image == null)
                            <img class="rounded-circle img-fluid" src="/storage/no_image.png">
                        @else
                            <img class="rounded-circle img-fluid" src="/storage/{{Auth::user()->user_image}}">
                        @endif
                    </div>
                    <div class="col-8 offset-1">
                        <h2 class="m-4">{{Auth::user()->name }}</h3>
                        <button type="button" class="btn btn-dark btn-block">投稿する</button>
                    </div>
                </div>
            </div>
        </div>
     @else
        <div class="background_before_login">
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