<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark"> 
        <a class="navbar-brand ml-4" href="/"><i class="fab fa-instagram"></i>｜Nyanstagram</a>
        @if (Auth::check())
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="{{ route('users.show', ['id' => Auth::id()])}}" class="nav-link">自分のアカウント</a></li>
                    <li class="nav-item"><a href="{{ route('users.index')}}" class="nav-link">ユーザーを探す</a></li>
                    <li class="nav-item"><a href="{{ route('logout.get')}}" class="nav-link"><i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </div>
        @else
            {{-- 何も表示しない --}}
        @endif
    </nav>
</header>