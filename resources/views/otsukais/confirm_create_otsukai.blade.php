@extends('layouts.app')

@section('content')
   <h2>以下の内容で、おつかいを確定しますか？</h2>

   <div>受付期限：{{ $time }}</div>
   <div>お店：{{ $shop->name }}</div>
   <div>個数：{{ $request->capacity }}</div>
   <div>受け渡し場所：キャビネット{{ $request->deliverPlace}}</div>    
   <div class= 'btn btn-lg btn-success'  type="button" onclick="history.back()">戻る
   </div>
   
   {!! Form::open(['route' => 'otsukais.store']) !!}
   {!! Form::hidden('from_hour',$time)!!}
   {!! Form::hidden('shop_id', $shop->id) !!}
   {!! Form::hidden('capacity',$request->capacity) !!}
   {!! Form::hidden('deliverPlace',$request->deliverPlace) !!}
   {!! Form::submit('おつかい確定', ['class' => 'btn btn-success']) !!}
   {!! Form::close() !!}
   
   
@endsection