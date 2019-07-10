@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="background_after_login">
            <div class="container p-4">
                <div class="row">
                    <div class="col-md-3 offset-md-1">
                        @if(Auth::user()->user_image == null)
                            <img class="rounded-circle img-fluid" src="/storage/no_image.png">
                        @else
                            <img class="rounded-circle img-fluid icon-image" src="/storage/{{Auth::user()->user_image}}">
                        @endif
                    </div>
                    <div class="col-md-7 offset-md-1">
                        <h2>{{Auth::user()->name}}</h2>
                        {!! link_to_route('photos.create', '投稿する', [], ['class' => 'btn btn-dark btn-block mt-4']) !!}
                    </div>
                </div>
            </div>
            @if (count($photos) > 0)
                @include('photos.photos', ['photos' => $photos])
            @endif
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