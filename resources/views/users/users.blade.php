@if (count($users) > 0)
    <div class="container mt-4">
        <ul class="list-unstyled">
            @foreach ($users as $user)
                <li class="media">
                    <img class="mr-2 rounded" src="" alt="">
                    <div class="media-body">
                        <div>
                            {{ $user->name }}
                        </div>
                        <div>
                            <p>{!! link_to_route('users.show', 'プロフィールを見る', ['id' => $user->id]) !!}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        {{ $users->render('pagination::bootstrap-4') }}
    </div>
@endif