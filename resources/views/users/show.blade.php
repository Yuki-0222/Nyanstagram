@extends('layouts.app')

@section('content')
    <div class="background_after_login">
        <div class="container pt-4">
            <div class="row">
                <div class="col-3">
                    @if($user->user_image == null)
                        <img class="rounded-circle img-fluid" src="/storage/no_image.png" alt="">
                    @else
                        <img class="img-fluid img-thmbnail icon-image" src="/storage/{{$user->user_image}}" alt="">
                    @endif
                </div>
                <div class="col-8 offset-1">
                    <h2>{{$user->name}}</h2>
                    <h5 class="">{{$user->profile}}</h1>
                    <div class="row">
                        <ul class="nav">
                            <li class="nav-item">
                                <span class="nav-link pr-4">投稿</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pl-4 pr-4" href="#">フォロー中</a>
                            </li>
                            <li class="nav-item pl-4 pr-4">
                                <a class="nav-link" href="#">フォロワー</a>
                            </li>
                        </ul>
                    </div>
                    {!! link_to_route('users.edit', 'プロフィールを編集', ['id' => $user->id], ['class' => 'btn btn-dark mt-4 btn-block']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection