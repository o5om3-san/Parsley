<link href="css/style.css" rel="stylesheet" type="text/css">
@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-md-4">
            </aside>
            <div class="col-xs-8">
                @if (count($otsukais) > 0)
                    @include('otsukais.index', ['otsukais' => $otsukais])
                @endif
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <aside class="col-md-4">
            </aside>
            <div class="text-center">
                <h1>Parsley</h1>
                {!! link_to_route('register', 'Sign up now!', null, ['class' => 'btn btn-lg btn-success']) !!}
                <img src="images/parsley2.png" width="1200" height="800" alt="" class="img-responsive">

            </div>
        </div>
    @endif
@endsection