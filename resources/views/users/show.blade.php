@extends('layouts.app')
@section('content')
<?php
    $request = '';
    $otsukai = '';
    
    if (isset($_SERVER['HTTP_REFERER'])){
        switch (substr($_SERVER['HTTP_REFERER'], -4)){
            case 'firm': //リクエスト編集後
                $request = 'active';
                break;
            case '/pay': //支払い完了後
                $request = 'active';
                break;
            default: //その他
                $otsukai = 'active';
                break;
        }
    } else {
        $request = 'active';
    }
?>
<h2>マイページ</h2>
    <div class="mypagenav">
        <ul class="nav nav-tabs">
            <li class="<?= $request ?>">
                <a href="#tab1" data-toggle="tab">リクエスト履歴</a>
            </li>
            <li class="<?= $otsukai ?>">
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