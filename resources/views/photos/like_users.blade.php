@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="pt-4 pb-4">「いいね！」 {{ $photo->like_users()->count() }}件</h2>
        @include('users.users', ['users' => $users])
    </div>
@endsection