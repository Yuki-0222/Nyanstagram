@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="container p-4">
            <div class="row">
                <div class="col-md-3">
                    @include('users.user_icon', ['user' => $user])
                </div>
                <div class="col-md-9">
                    @include('users.user_info', ['user' => $user])
                    {!! link_to_route('users.show', '自分のプロフィールを見る', ['id' => $user->id], ['class' => 'btn btn-dark mt-4 btn-block']) !!}
                </div>
            </div>
        </div>
        @if (count($photos) > 0)
            @include('photos.photos', ['photos' => $photos])
        @endif
     @else
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
    @endif
@endsection