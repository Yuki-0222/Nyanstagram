<div class="container p-4">
    <div class="row row-eq-height">
        @foreach ($photos as $photo)
            <div class="col-md-4 p-2">
                <div class="bg-w rounded">
                    <a href="{{ route('users.show', ['id' => $photo->user->id]) }}">
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
                    <span class="pl-2">「コメント」 {{ $photo->comments->count() }}件</span>
                    <h6 class="p-2 m-0">{{ $photo->description }}</h6>
                    <h6 class="pl-2 pb-2">{{ $photo->created_at->format('Y年m月d日 H時i分') }}</h6>
                </div>
            </div>
        @endforeach
    </div>
    {{ $photos->render('pagination::bootstrap-4') }}
</div>