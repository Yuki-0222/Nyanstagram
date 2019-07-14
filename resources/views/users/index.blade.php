@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        @include('users.users', ['users' => $users])
    </div>
@endsection