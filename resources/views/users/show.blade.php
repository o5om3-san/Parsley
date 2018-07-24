@extends('layouts.app')
@section('content')
    <div class="mypagenav">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab1" data-toggle="tab">リクエスト履歴</a>
            </li>
            <li>
                <a href="#tab2" data-toggle="tab">おつかい履歴</a>
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