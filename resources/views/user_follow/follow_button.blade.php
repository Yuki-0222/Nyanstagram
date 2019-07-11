@if (Auth::id() != $user->id)
    @if (Auth::user()->is_following($user->id))
        {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('フォローをやめる', ['class' => "btn btn-danger btn-block mt-4"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
            {!! Form::submit('フォローする', ['class' => "btn btn-primary btn-block mt-4"]) !!}
        {!! Form::close() !!}
    @endif
@endif