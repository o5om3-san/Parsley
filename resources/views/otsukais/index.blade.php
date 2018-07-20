@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('otsukais.timeline', ['otsukais' => $otsukais])    
        </div>
    </div>
</div>
@endsection