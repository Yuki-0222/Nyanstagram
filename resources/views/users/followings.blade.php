@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="pt-4 pb-4">フォロー中 {{ $user->followings()->count() }}人</h2>
        @include('users.users', ['users' => $users])
    </div>
@endsection

