@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-3 offset-md-1">
                @include('users.user_icon', ['user' => $user])
            </div>
            <div class="col-md-7 offset-md-1">
                @include('users.user_info', ['user' => $user])
                @if(Auth::user()->id == $user->id)
                    {!! link_to_route('users.edit', 'プロフィールを編集', ['id' => $user->id], ['class' => 'btn btn-dark mt-4 btn-block']) !!}
                @endif
            </div>
        </div>
    </div>
    @if (count($photos) > 0)
        @include('photos.photos', ['photos' => $photos])
    @endif
@endsection