@extends('layouts.app')

@section('content')

<h1>編集</h1>

{!! Form::open( ['route' => ['requests.update', $onegai->id], 'method' => 'put']) !!}

     <div class="form-group">
        {!! Form::label('name', '商品名:') !!}
        <select name='item'>
            @foreach ($items as $item)
                <option value={{$item->id}}> {{ $item->name }} </option>
            @endforeach
        </select>
    </div>
                    
    <div class="form-group">
        {!! Form::label('amount', '注文数:') !!}
        {!! Form::selectRange('amount', 1, $otsukai->capacity-$amount, null, ['class' => 'form-control']) !!}
    </div>
                
    <div class='form-group'>
        {!! Form::label('comment', 'コメント欄:') !!}
        {!! Form::textarea('comment', null, ['size' => '50x2']) !!}
    </div>
    
    <a href="#">{{ $user->name }}</a>さんに
    {!! Form::submit('おつかいを頼む', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}

@endsection