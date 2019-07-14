<div class="row">
    <h2>{{ $user->name }}</h2>
</div>
<div class="row">
    <ul class="nav">
        <li class="nav-item">
            <span class="nav-link pr-4">投稿 {{ $user->photos()->count() }}件</span></span>
        </li>
        <li class="nav-item">
            <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link pl-4 pr-4">フォロー中 {{ $user->followings()->count() }}人</a>
        </li>
        <li class="nav-item pl-4 pr-4">
            <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link">フォロワー {{ $user->followers()->count() }}人</a>
        </li>
    </ul>
</div>

<h5 class="">{{$user->profile}}</h5>

@include('user_follow.follow_button', ['user' => $user])