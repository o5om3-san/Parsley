<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                　　<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><i class="fab fa-product-hunt fa-lg fa-fw "></i>Parsley </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>{!! link_to_route('users.show','マイページ',['id' => Auth::id()]) !!}</li>
                                <li>{!! link_to_route('otsukais.index','おつかい一覧',null) !!}</li>
                                <li>{!! link_to_route('logout.get','ログアウト',null) !!}</li>
                            </ul>
                        </li>
                    @else
                        <li>{!! link_to_route('register', '登録') !!}</li>
                        <li>{!! link_to_route('login', 'ログイン') !!}</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>