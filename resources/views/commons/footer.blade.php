<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="footer-header">
                <a class="navbar-brand" href="/"></a>
            </div>
            
                <ul class="nav navbar-nav navbar-left">
                    @if (Auth::check())
                    
                        <li>{!! link_to_route('users.show','MyPage',['id' => Auth::id()]) !!}</li>
                        <li>{!! link_to_route('otsukais.create','買い物に行く') !!}</li>
                        <li>{!! link_to_route('otsukais.index','おつかいの一覧') !!}</li>
                        <li>{!! link_to_route('logout.get','Logout') !!}</li>
                    @else
                        <li>{!! link_to_route('login', 'ログイン') !!}</li>
                        <li>{!! link_to_route('register', '登録') !!}</li>
                    @endif
                </ul>
        </div>
    </nav>
</header>