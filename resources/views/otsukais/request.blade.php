
@extends('layouts.app')

@section('content')
    
     <h1>注文画面</h1>
     
                {!! Form::model( ['route' => 'otsukais.store']) !!}
                
                
                
                <div class="form-group">
                    
                    {!! Form::label('name', '商品名:') !!}
                    {!! Form::select('amount',$names, null, ['class' => 'form-control']) !!}
                
                <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                </tr>
                @endforeach
                </tbody>
                
                
                </div>
                    
                <div class="form-group">
                    {!! Form::label('price', '価格:') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('amount', '注文数:') !!}
                    {!! Form::select('amount',['' => 'Select', '0' => '1', '1' => '2', '2' => '3', '3' => '4', '4' => '5', '5' => '6', '6' => '7', '7' => '8', '8' => '9', '9' => '10'], null, ['class' => 'form-control']) !!}
                </div>
       　　　　　　　
                    <a>さんに</a>
                    {!! Form::submit('request', ['class' => 'btn btn-primary']) !!}
                    
                {!! Form::close() !!}
               

@endsection