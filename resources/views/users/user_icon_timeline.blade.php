@if($user->user_image == null)
    <img class="rounded-circle icon-img-timeline ml-2" src="/images/no_image.png" alt="">
@else
    <img class="rounded-circle icon-img-timeline ml-2" src="{{ $user->user_image }}" alt="">
@endif