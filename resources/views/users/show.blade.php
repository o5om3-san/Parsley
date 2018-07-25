@extends('layouts.app')
@section('content')
    <h2>マイページ</h2>
    <div class="mypagenav">
        <ul class="nav nav-tabs">
            <li class="<?php if(isset($_SERVER['HTTP_REFERER'])){if (substr($_SERVER['HTTP_REFERER'], -8) != "complete" && substr($_SERVER['HTTP_REFERER'], -4) != "com/"){ echo "active";}} ?>">
                <a href="#tab1" data-toggle="tab">リクエスト履歴</a>
            </li>
            <li class="<?php if(isset($_SERVER['HTTP_REFERER'])){if (substr($_SERVER['HTTP_REFERER'], -8) == "complete" || substr($_SERVER['HTTP_REFERER'], -4) == "com/"){ echo "active";}} ?>">
                <a href="#tab2" data-toggle="tab">おつかい履歴</a>
            </li>
        </ul>
    </div>
    
    <div class="tab-content">
        <div id="tab1" class="tab-pane tab-box <?php if(isset($_SERVER['HTTP_REFERER'])){if (substr($_SERVER['HTTP_REFERER'], -8) != "complete" && substr($_SERVER['HTTP_REFERER'], -4) != "com/"){ echo "active";}} ?>">
            @include('users.giant', ['otsukai_giants' => $otsukai_giants])
        </div>
        <div id="tab2" class="tab-pane tab-box <?php if(isset($_SERVER['HTTP_REFERER'])){if (substr($_SERVER['HTTP_REFERER'], -8) == "complete" || substr($_SERVER['HTTP_REFERER'], -4) == "com/"){ echo "active";}} ?>">
            @include('users.nobita', ['otsukais' => $otsukais])
        </div>
    </div>
    
@endsection