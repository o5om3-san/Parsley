
@extends('layouts.app')

@section('content')
    
     <h1>注文画面</h1>
     
                {!! Form::model( ['route' => 'otsukai_giant.request','method' => 'post']) !!}
                
                <div class="form-group">
                    
                    {!! Form::label('name', '商品名:') !!}
                    <select name='names'>
                        @foreach ($items as $item)
                            <option value={{$item->id}}> {{$item->name}} </option>
                        @endforeach
                    </select>
                    
                </div>
                    
                <div class="form-group">
                    {!! Form::label('amount', '注文数:') !!}
                    {!! Form::select('amount',['' => 'Select', '0' => '1', '1' => '2', '2' => '3', '3' => '4', '4' => '5', '5' => '6', '6' => '7', '7' => '8', '8' => '9', '9' => '10'], null, ['class' => 'form-control']) !!}
                </div>
                
                <div class='form-group'>
                    {!! Form::label('comment', 'コメント欄:') !!}
                    {!! Form::textarea('comment',null)!!}
                </div>
       　　　　　　　
                    {{$user->name}}<a>さんに</a>
                    {!! Form::submit('request', ['class' => 'btn btn-primary']) !!}
                    
                    
                {!! Form::close() !!}
               

@endsection