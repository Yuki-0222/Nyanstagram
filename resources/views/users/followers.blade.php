@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="pt-4 pb-4">フォロワー {{ $user->followers()->count() }}人</h2>
        @include('users.users', ['users' => $users])
    </div>
@endsection
