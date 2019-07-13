<div class="container p-4">
    <div class="row row-eq-height">
        @foreach ($photos as $photo)
            <div class="col-md-4 pb-4">
                <h6>{{$photo->user->name}}</h6>
                <img class="rounded img-fluid img-thmbnail image-roll" src="/storage/{{$photo->image}}" alt="">
                <h6>{{$photo->comment}}</h6>
                <div class="btn-group">
                    @if (Auth::user()->is_like($photo->id))
                        {!! Form::open(['route' => ['likes.unlike', $photo->id], 'method' => 'delete']) !!}
                            {!! Form::submit('いいね！', ['class' => 'btn btn-success btn-xs']) !!}
                        {!! Form::close() !!}
                        {{ $photo->like_users()->count() }}
                    @else
                        {!! Form::open(['route' => ['likes.like', $photo->id], 'method' => 'post']) !!}
                            {!! Form::submit('いいね！', ['class' => 'btn btn-outline-success btn-xs']) !!}
                        {!! Form::close() !!}
                        {{ $photo->like_users()->count() }}
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    {{ $photos->render('pagination::bootstrap-4') }}
</div>