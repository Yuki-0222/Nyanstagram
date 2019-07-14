@if($user->user_image == null)
    <img class="rounded-circle icon-img" src="/images/no_image.png" alt="">
@else
    <img class="rounded-circle icon-img" src="{{ $user->user_image }}" alt="">
@endif