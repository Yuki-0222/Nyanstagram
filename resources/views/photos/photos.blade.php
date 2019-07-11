<div class="container p-4">
    <div class="row row-eq-height">
        @foreach ($photos as $photo)
            <div class="col-md-4 pb-4">
                <h6>{{$photo->user->name}}</h6>
                <img class="rounded img-fluid img-thmbnail image-roll" src="/storage/{{$photo->image}}" alt="">
                <h6>{{$photo->comment}}</h6>
            </div>
        @endforeach
    </div>
    {{ $photos->render('pagination::bootstrap-4') }}
</div>