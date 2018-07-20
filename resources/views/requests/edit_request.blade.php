@extends('layouts.app')

@section('content')

<h1>編集</h1>

{!! Form::open( ['route' => ['requests.confirm_edit_request', $onegai->id]]) !!}

     <div class="form-group">
        {!! Form::label('name', '商品名:') !!}
        <select name='item'>
            @foreach ($items as $item)
                <option value={{$item->id}} <?php if($onegai->item_id == $item->id){ echo 'selected'; }?> > {{ $item->name }} </option>
            @endforeach
        </select>
    </div>
                    
    <div class="form-group">
        {!! Form::label('amount', '注文数:') !!}
        {!! Form::selectRange('amount', 1, $otsukai->capacity-$amount+$onegai->amount, $onegai->amount) !!}
    </div>
                
    <div class='form-group'>
        {!! Form::label('comment', 'コメント欄:') !!}
        {!! Form::textarea('comment', $onegai->comment, ['size' => '50x2']) !!}
    </div>
    
    <a href="#">{{ $user->name }}</a>さんに
    {!! Form::submit('おつかいを頼む', ['class' => 'btn btn-success']) !!}

{!! Form::close() !!}

@endsection