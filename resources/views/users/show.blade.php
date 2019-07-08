@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row align-item-center">
            <div class="col-3">
                @if($user->user_image == null)
                    <img class="rounded-circle img-fluid" src="/storage/no_image.png" alt="">
                @else
                    <img class="rounded-circle img-fluid" src="/storage/{{$user->user_image}}" alt="">
                @endif
            </div>
            
            <div class="col-1">
            </div>
        
            <div class="col-8">
                <h2 class="m-4">{{ $user->name }}</h3>
                <h5 class="m-4">{{ $user->profile }}</h1>
                {!! link_to_route('users.edit', 'プロフィールを編集', ['id' => $user->id], ['class' => 'btn btn-dark mt-4 btn-block']) !!}
            </div>
        </div>
    </div>
@endsection