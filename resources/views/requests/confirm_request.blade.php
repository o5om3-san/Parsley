@extends('layouts.app')

@section('content')
    <h2>以下の内容で、注文を受け付けました。</h2>
    @include('users.giant', ['otsukai_giants' => $otsukai_giants])
@endsection