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
                <img src="images/parsley2.png" alt="" class="img-responsive">
            </div>
            <div class="kanban">
                <a href="requests.create"><img src="images/kanbantanomu.png" width=250 alt="おつかいを頼む" class="img-responsive"></a>
                <a href="otsukais.create"><img src="images/kanbaniku.png" width=250 alt="おつかいに行く" class="img-responsive"></a>
            </div>
        </div>
    @endif
@endsection