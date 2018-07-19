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
                <a class="navbar-brand" href="/">Parsley <i class="fab fa-product-hunt fa-lg fa-fw fa-spin"></i></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                    
                    <li class="name">{{ Auth::user()->name }}さん</li>
                            <li>{!! link_to_route('users.show','My Page',['id' => Auth::id()],['class' => 'fas fa-home fa-lg']) !!}</li>
                            <li>{!! link_to_route('otsukais.create','買い物に行く',null,['class' => 'fas fas fa-shopping-cart fa-lg']) !!}</li>
                            <li>{!! link_to_route('otsukais.index','おつかいの一覧',null,['class' => 'fas fa-list-alt fa-lg']) !!}</li>
                            <li>{!! link_to_route('logout.get','Logout',null,['class' => 'fas fa-sign-out-alt fa-lg']) !!}</li>
                    @else
                        <li><a href="/login"><img src="images/parsleylogin.png" width=280 alt="signup" class="img-responsive"></a></li>
                        <li><a href="/register"><img src="images/parsleysignup.png" width=300 alt="signup" class="img-responsive"></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>