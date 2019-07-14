<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand nav_font" href="/"><i class="fab fa-instagram"></i>｜Nyanstagram</a>
            
            @if (Auth::check())
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="nav-bar">
                    <ul class="navbar-nav mr-auto"></ul>
                    <ul class="navbar-nav">
                        <li class="nav-item nav_font"><a href="{{ route('photos.create')}}" class="nav-link">投稿する</a></li>
                        <li class="nav-item dropdown nav_font">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">メニュー</a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item"><a href="{{ route('users.show', ['id' => Auth::id()]) }}">自分のアカウント</a></li>
                                <li class="dropdown-item"><a href="{{ route('users.index')}}">ユーザーを探す</a></li>
                                <li class="dropdown-item"><a href="{{ route('users.likes', ['id' => Auth::id()] )}}">いいね！一覧</a></li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item"><a href="{{ route('logout.get')}}">ログアウト</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endif
        </div> 
    </nav>
</header>