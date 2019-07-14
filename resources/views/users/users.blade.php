@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media m-4 p-4">
                <div style="width: 100px;">
                    <a href="{{ route('users.show', ['id' => $user->id]) }}">
                        @include('users.user_icon', ['user' => $user])
                    </a>
                </div>
                <div class="media-body ml-4">
                    <p>{{ $user->name }}</p>
                    <p>{{ $user->profile }}</p>
                    @include('user_follow.follow_button')
                </div>
            </li>
        @endforeach
    </ul>
    {{ $users->render('pagination::bootstrap-4') }}
@endif