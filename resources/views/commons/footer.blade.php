<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="footer-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                　　<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    @if (Auth::check())
                        <li>{!! link_to_route('otsukais.create', 'Go Shopping') !!}</li>
                    @else
                        <li>{!! link_to_route('login', 'Login') !!}</li>
                        <li>{!! link_to_route('register', 'Sign up') !!}</li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>