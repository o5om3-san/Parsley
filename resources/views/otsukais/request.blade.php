@extends('layouts.app')

@section('content')
    
     <h1>注文画面</h1>
     
                {!! Form::model( ['route' => 'otsukais.store']) !!}
                
                
                
                
                <div class="form-group">
                    
                    {!! Form::label('name', '商品名:') !!}
                    <selsect name='names'>
                        @foreach ($items as $item)
                            <option value={{$item->id}}> {{$item->name}} </option>
                        @endforeach
                    </selsect>
                
                </div>
                    
                
                <div class="form-group">
                    {!! Form::label('amount', '注文数:') !!}
                    {!! Form::select('amount',['' => 'Select', '0' => '1', '1' => '2', '2' => '3', '3' => '4', '4' => '5', '5' => '6', '6' => '7', '7' => '8', '8' => '9', '9' => '10'], null, ['class' => 'form-control']) !!}
                </div>
                
                <div class='form-group'>
                    {!! Form::label('comment', 'コメント:') !!}
                    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
                </div>
                    {{$user->name}}<a>さんに</a>
                    {!! Form::submit('request', ['class' => 'btn btn-primary']) !!}
                    
                {!! Form::close() !!}
               

@endsection