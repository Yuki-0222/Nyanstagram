@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <h2>フォロー中 {{ $user->followings()->count() }}人</h2>
        @include('users.users', ['users' => $users])
    </div>
@endsection

