<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                　　<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Parsley <i class="fab fa-product-hunt fa-lg fa-spin"></i></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li>{!! link_to_route('users.show','MyPage',['id' => Auth::id()]) !!}</li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                        <li>{!! link_to_route('otsukais.create','おかいもの') !!}</li>
                        <li>{!! link_to_route('otsukais.index','おつかい') !!}</li>
                        <li role="separator" class="divider"></li>
                        <li>{!! link_to_route('logout.get','Logout') !!}</li>
                        
                    @else
                        <li>{!! link_to_route('login', 'ログイン') !!}</li>
                        <li>{!! link_to_route('register', 'とうろく') !!}</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>