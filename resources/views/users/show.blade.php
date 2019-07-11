@extends('layouts.app')

@section('content')
    <div class="background_after_login">
        <div class="container pt-4">
            <div class="row">
                <div class="col-md-3 offset-md-1">
                    @include('users.user_icon', ['user' => $user])
                    @include('user_follow.follow_button', ['user' => $user])
                </div>
                <div class="col-md-7 offset-md-1">
                    <h2>{{$user->name}}</h2>
                    <h5 class="">{{$user->profile}}</h1>
                    <div class="row">
                        <ul class="nav">
                            <li class="nav-item">
                                <span class="nav-link pr-4">投稿 {{ $count_photos }}件</span></span>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link pl-4 pr-4">フォロー中 {{ $count_followings }}人</a>
                            </li>
                            <li class="nav-item pl-4 pr-4">
                                <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link">フォロワー {{ $count_followers }}人</a>
                            </li>
                        </ul>
                    </div>
                    @if(Auth::user()->id == $user->id)
                        {!! link_to_route('users.edit', 'プロフィールを編集', ['id' => $user->id], ['class' => 'btn btn-dark mt-4 btn-block']) !!}
                    @endif
                </div>
            </div>
        </div>
        @if (count($photos) > 0)
            @include('photos.photos', ['photos' => $photos])
        @endif
    </div>
@endsection