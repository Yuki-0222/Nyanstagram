<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        <a class="navbar-brand" href="/">Nyanstagram</a>
        
        @if (Auth::check())
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item">{!! link_to_route('users.show', '自分のアカウント', ['id' => Auth::id()], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item">{!! link_to_route('users.index', 'ユーザーを探す', [], ['class' => 'nav-link']) !!}</li>
                <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
            </ul>
        </div>
        @else

        @endif
    </nav>
</header>