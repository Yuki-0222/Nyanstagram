@if($user->user_image == null)
    <img class="rounded-circle icon-img-list ml-2" src="/storage/no_image.png" alt="">
@else
    <img class="rounded-circle icon-img-list ml-2" src="/storage/{{ $user->user_image }}" alt="">
@endif