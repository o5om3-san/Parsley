@extends('layouts.app')

@section('content')

   <div class="row">
     <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-offset-8 col-lg-offset-3 col-lg-6">
    <h1>新規おつかい</h1>
    
    {!! Form::model($otsukai, ['route' => 'otsukais.store']) !!}
            
      <div class="form-group">
        {!! Form::label('deadline', 'Deadline:') !!}
        {{Form::selectRange('from_hour', 8, 22, '', ['placeholder' => ''])}}時
        {{Form::selectRange('from_minutes', 00, 59, '', ['placeholder' => ''])}}分
      </div>
                    
      <div class="form-group">
        {!! Form::label('shop_id', 'Shop:') !!}
          <select name="shop_id">
            @foreach ($shops as $shop)
              <option value={{$shop->id}}> {{$shop->name}} </option>
            @endforeach
          </select>    
      
      
      </div>
      
      <div class="form-group">
        {!! Form::label('capacity', 'Capacity:') !!}
        {{Form::selectRange('capacity', 1, 10, '', ['placeholder' => ''])}}個
        
      </div>
      
      <div class="form-group">
        {!! Form::label('deliverPlace', 'DeliverPlace:') !!}
        {!! Form::text('deliverPlace', null, ['class' => 'form-control']) !!}
      </div>
      {!! Form::submit('投稿', ['class' => 'btn btn-success']) !!}
        
    {!! Form::close() !!}
     </div>
   </div>
@endsection