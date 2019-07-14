@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-4">いいね！数：{{ $user->likes()->count() }}件</h2>
        @if (count($photos) > 0)
            @include('photos.photos', ['photos' => $photos])
        @endif
    </div>
@endsection