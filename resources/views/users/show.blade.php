@extends('layouts.app')

@section('content')
    <div class="mypagenav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a href="#tab1" class="nav-link navbar-default active" data-toggle="tab">リクエスト履歴</a>
            </li>
            <li class="nav-item">
                <a href="#tab2" class="nav-link navbar-default" data-toggle="tab">おつかい履歴</a>
            </li>
        </ul>
    </div>
    
    <div class="tab-content">
        <div id="tab1" class="tab-pane active tab-box">
            @include('users.giant', ['otsukai_giants' => $otsukai_giants])
        </div>
        <div id="tab2" class="tab-pane tab-box">
            @include('users.nobita', ['otsukais' => $otsukais])
        </div>
    </div>
@endsection