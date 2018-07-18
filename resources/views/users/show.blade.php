@extends('layouts.app')

@section('content')
    <div class="user-profile">
        <div class="icon text-center">
            <img src="images/parsley2.png" class="img-circle">
        </div>
        <div class="name text-center">
            <h1>マイページ</h1>
            <h1>{{ $user->name }}</h1>
            <h>リクエスト履歴</h>
             @include('users.giant', ['otsukai_giants' => $otsukai_giants])
            <h>おつかい履歴</h>             
             @include('users.nobita', ['otsukais' => $otsukais])
        </div>
        <div class="status text-center">
            <ul>
            </ul>
        </div>
    </div>
@endsection