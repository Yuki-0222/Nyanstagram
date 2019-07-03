@extends('layouts.app')

@section('content')
    @if (Auth::check())

    @else
        <div class="background">
            <div class="container description">
                <h1>Nyanstagram</h1>
                <br/>
                <h3>猫の画像を専門に扱ったSNSサイトです。</h2>
                <h3>皆様のお気に入りの猫画像をアップロードしてください。</h3>
    
                <div class="buttons">
                    <a class="btn btn-dark d-block d-md-inline-block mb-2 pr-4 pl-4 mb-md-0 btn-lg" href="/" role="button">会員登録</a>
                    <a class="btn btn-dark d-block d-md-inline-block mb-2 pr-4 pl-4 mb-md-0 btn-lg" href="/" role="button">ログイン</a>
                </div>
            </div>
        </div>
    @endif
   
@endsection