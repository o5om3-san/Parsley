@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            <h1>{{ $user->name }}さんの明細</h1>
            <!--@include('users.giant', ['otsukai_giants' => $otsukai_giants])        -->
        
        </div>
    </div>
@endsection