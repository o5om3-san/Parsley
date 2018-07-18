@extends('layouts.app')

@section('content')
    <div class="name text-center">
        <h1>マイページ</h1>
        <h2>{{ $user->name }}</h2>
    </div>
    <p id="tabcontrol">
        <a href="users.giant"></a>
        <a href="users.nobita"></a>  
    </p>
    <div id="tabbody">
        <div id="tabpage1">@include('users.giant', ['otsukai_giants' => $otsukai_giants])</div>
        <div id="tabpage2">@include('users.nobita', ['otsukais' => $otsukais])</div>
    </div>
    <div class="status text-center">
        <ul>
        </ul>
    </div>
    </div>
@endsection