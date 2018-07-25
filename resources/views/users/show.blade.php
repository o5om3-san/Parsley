@extends('layouts.app')
@section('content')
<?php
    $request = '';
    $otsukai = '';
    
    if (isset($_SERVER['HTTP_REFERER'])){
        switch (substr($_SERVER['HTTP_REFERER'], -4)){
            case 'com/': //おつかい作成後
            case 'dit/': //おつかい編集後
            case 'ete/': //おつかい取引終了後
            case 'irm/': //
            case 'pay/': //
        }
    }
    
    if(isset($_SERVER['HTTP_REFERER'])){if (substr($_SERVER['HTTP_REFERER'], -8) != "complete" && substr($_SERVER['HTTP_REFERER'], -4) != "com/"){ echo "active";}}
    if(isset($_SERVER['HTTP_REFERER'])){if (substr($_SERVER['HTTP_REFERER'], -8) == "complete" || substr($_SERVER['HTTP_REFERER'], -4) == "com/"){ echo "active";}}
?>
    <div class="mypagenav">
        <ul class="nav nav-tabs">
            <li class="<?= $request ?>">
                <a href="#tab1" data-toggle="tab">リクエスト履歴</a>
            </li>
            <li class="<?php $otsukai ?>">
                <a href="#tab2" data-toggle="tab">おつかい履歴</a>
            </li>
        </ul>
    </div>
    
    <div class="tab-content">
        <div id="tab1" class="tab-pane tab-box <?= $request ?>">
            @include('users.giant', ['otsukai_giants' => $otsukai_giants])
        </div>
        <div id="tab2" class="tab-pane tab-box <?= $otsukai ?>">
            @include('users.nobita', ['otsukais' => $otsukais])
        </div>
    </div>
    
@endsection