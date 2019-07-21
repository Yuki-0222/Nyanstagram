@extends('layouts.app')

@section('content')
    <div class="container mb-4">
        <div class="bg-w mt-4">
            <li class="media p-2" style="background-color: white">
                <div style="width: 40px;">
                    <a href="{{ route('users.show', ['id' => $photo->user->id]) }}">
                        @include('users.user_icon_timeline', ['user' => $photo->user])
                    </a>
                </div>
                <div class="media-body ml-4">
                    <a href="{{ route('users.show', ['id' => $photo->user->id]) }}" class="text-dark" style="text-decoration:none;">{{ $photo->user->name }}</a>
                </div>
            </li>
            <img class="img-fluid pb-2" src="{{ $photo->image }}" alt="">
            <h6 class="p-2 mb-0">投稿日　{{ $photo->created_at->format('Y年m月d日 H時i分') }}</h6>
            <p class="p-2 m-0">{{ $photo->description }}</p>
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
                
                @if ($photo->like_users()->count() > 0)
                    <a href="{{ route('photos.like_users', ['id' => $photo->id]) }}" class="text-dark" style="text-decoration:none;">「いいね！」 {{ $photo->like_users()->count() }}件</a>
                @else
                    <span>「いいね！」 {{ $photo->like_users()->count() }}件</span>
                @endif    
                <span class="pl-2">「コメント」 {{ $photo->comments->count() }}件</span>
            </div>
            <hr class="m-0">
            <div>
                @if ($comments->count() > 0)
                    <ul class="list-unstyled m-0">
                    @foreach ($comments as $comment)
                        <p class="pl-2">{{ $comment->created_at->format('Y年m月d日 H時i分') }}</p>
                        <li class="media p-2">
                            <div style="width: 40px;">
                                <a href="{{ route('users.show', ['id' => $comment->user->id]) }}">
                                    @include('users.user_icon_timeline', ['user' => $comment->user])
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
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
                投稿を削除する
            </button>
            
        @endif
    </div>

    {{-- モーダルの中身 --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">本当にこの投稿を削除しますか？</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    {!! Form::model($photo, ['route' => ['photos.destroy', $photo->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除する', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>
    {{-- モーダル終了 --}}
@endsection