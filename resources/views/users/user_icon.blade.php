@if($user->user_image == null)
    <img class="rounded-circle img-fluid icon-image" src="/storage/no_image.png" alt="">
@else
    <img class="rounded-circle img-fluid img-thmbnail icon-image" src="/storage/{{$user->user_image}}" alt="">
@endif