@extends('layouts.app')

@section('content')
    <div class="name text-center">
        <h1>マイページ</h1>
        <h1>{{ $user->name }}</h1>
    </div>
    <div class="tabbox">
        <input type="radio" name="tabset" id="1">
        <label for="tabcheck1" class="tab">リクエスト履歴</label>
        <input type="radio" name="tabset" id="2">
        <label for="tabcheck2" class="tab">おつかい履歴</label>
        <div class="tabcontent" id="tabcontent1">@include('users.giant', ['otsukai_giants' => $otsukai_giants])</div>
        <div class="tabcontent" id="tabcontent2">@include('users.nobita', ['otsukais' => $otsukais])</div>
    </div>
        <!--<h>リクエスト履歴</h>-->
        <!--    @include('users.giant', ['otsukai_giants' => $otsukai_giants])-->
        <!--<h>おつかい履歴</h>             -->
        <!--    @include('users.nobita', ['otsukais' => $otsukais])-->
@endsection