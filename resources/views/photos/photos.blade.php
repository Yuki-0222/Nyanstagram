<div class="container p-4">
    <div class="row">
        @foreach ($photos as $photo)
            <div class="col-md-4 p-2">
                <div class="bg-w rounded">
                    <li class="media p-2">
                        <div style="width: 30px;">
                            <a href="{{ route('users.show', ['id' => $photo->user->id]) }}">
                                @include('users.user_icon_timeline', ['user' => $photo->user])
                            </a>
                        </div>
                        <div class="media-body ml-4">
                            <a href="{{ route('users.show', ['id' => $photo->user->id]) }}" class="text-dark" style="text-decoration:none;">{{ $photo->user->name }}</a>
                        </div>
                    </li>
                    
                    <a href="{{ route('photos.show', ['id' => $photo->id]) }}"><img class="img-fluid image-roll" src="{{ $photo->image }}" alt=""></a>
                    
                    <h6 class="p-2 mb-0">投稿日　{{ $photo->created_at->format('Y年m月d日 H時i分') }}</h6>
                    
                    <p class="p-2 m-0">{{ $photo->description }}</p>
                    
                    <div class="btn-group p-2">
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
                </div>
            </div>
        @endforeach
    </div>
    {{ $photos->render('pagination::bootstrap-4') }}
</div>