@extends('layouts.app')

@section('content')

<h1>注文画面</h1>

{!! Form::open( ['route' => ['requests.store', $otsukai->id], 'method' => 'post']) !!}

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
        {!! Form::selectRange('amount',1,10, null) !!}
    </div>
                
    <div class='form-group'>
        {!! Form::label('comment', 'コメント欄:') !!}
        {!! Form::text('comment',null)!!}
    </div>
    
    <a href="#">{{$user->name}}</a>さんに
    {!! Form::submit('おつかいを頼む', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}

@endsection