@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="bg-w rounded m-4">
            <li class="media p-2" style="background-color: white">
                <div style="width: 40px;">
                    <a href="{{ route('users.show', ['id' => $photo->user->id]) }}">
                        @include('users.user_icon', ['user' => $photo->user])
                    </a>
                </div>
                <div class="media-body ml-4">
                    <h5 class="m-0 pt-1">{{ $photo->user->name }}</h5>
                </div>
            </li>
            <img class="img-fluid pb-2" src="/storage/{{$photo->image}}" alt="">
            <h6 class="p-2 mb-0">投稿日　{{ $photo->created_at->format('Y年m月d日 H時i分') }}</h6>
            <div class="btn-group pl-2">
                @if (Auth::user()->is_like($photo->id))
                    {!! Form::open(['route' => ['likes.unlike', $photo->id], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="fas fa-heart"></i>', ['class' => "btn btn-link text-danger p-0", 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['likes.like', $photo->id], 'method' => 'post']) !!}
                        {!! Form::button('<i class="fas fa-heart"></i>', ['class' => "btn btn-link text-secondary p-0", 'type' => 'submit']) !!}
                    {!! Form::close() !!}
                @endif
                <span>「いいね！」 {{ $photo->like_users()->count() }}件</span>
            </div>
            <h5 class="pl-2 pt-4 pb-4">{{ $photo->description }}</h5>
            <h6 class="pl-2">コメント数　{{ $photo->comments->count() }}件</h6>
            <hr class="m-0">
            <div>
                @if ($comments->count() > 0)
                    <ul class="list-unstyled m-0">
                    @foreach ($comments as $comment)
                        <p class="pl-2">{{ $comment->created_at->format('Y年m月d日 H時i分') }}</p>
                        <li class="media p-2">
                            <div style="width: 40px;">
                                <a href="{{ route('users.show', ['id' => $comment->user->id]) }}">
                                    @include('users.user_icon', ['user' => $comment->user])
                                </a>
                            </div>
                            <div class="media-body ml-4">
                                <span>{{ $comment->user->name }}</span>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </li>
                        <hr class="m-0">
                    @endforeach
                    </ul>
                @endif
                <div>
                    {!! Form::open(['route' => ['comments.store', $photo->id], 'method' => 'post']) !!}
                        <div class="form-group">
                            {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'rows' => '3']) !!}
                            {!! Form::submit('コメントする', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        @if (Auth::id() == $photo->user_id)
            {!! Form::model($photo, ['route' => ['photos.destroy', $photo->id], 'method' => 'delete']) !!}
                {!! Form::submit('投稿を削除する', ['class' => 'btn btn-danger btn-sm ml-4 mb-4']) !!}
            {!! Form::close() !!}
        @endif
    </div>
@endsection