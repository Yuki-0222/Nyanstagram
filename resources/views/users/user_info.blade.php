<h2>{{ $user->name }}</h2>
<div class="row">
    <span class="nav-link col-md-4">投稿 {{ $user->photos()->count() }}件</span>
    <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link col-md-4"><span class="text-dark">フォロー中 {{ $user->followings()->count() }}人</span></a>
    <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link col-md-4"><span class="text-dark">フォロワー {{ $user->followers()->count() }}人</span></a>
</div>

<p class="mt-2">{{$user->profile}}</p>

@include('user_follow.follow_button', ['user' => $user])