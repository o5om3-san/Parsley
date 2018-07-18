<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="footer-header">
                <a class="navbar-brand" href="/"></a>
            </div>
            
                <ul class="nav navbar-nav navbar-left">
                    @if (Auth::check())
                        <li>{!! link_to_route('users.show','Home',['id' => Auth::id()],['class' => 'fas fa-home fa-lg']) !!}</li>
                        <li>{!! link_to_route('otsukais.create','買い物に行く',null,['class' => 'fas fa-shopping-cart fa-lg']) !!}</li>
                        <li>{!! link_to_route('otsukais.index','おつかいの一覧',null,['class' => 'fas fa-list-alt fa-lg']) !!}</li>
                        <li>{!! link_to_route('logout.get','Logout',null,['class' => 'fas fa-sign-out-alt fa-lg']) !!}</li>
                    @else
                        <li>{!! link_to_route('login', 'ログイン') !!}</li>
                        <li>{!! link_to_route('register', '登録') !!}</li>
                    @endif
                </ul>
        </div>
    </nav>
</header>
