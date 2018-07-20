@extends('layouts.app')

@section('content')
    <h2>以下の内容で、注文を確定しますか？</h2>

    <div>商品名：{{ $item->name }} × {{ $amount }}個</div>
    <div>商品代金： ￥{{ $item->price * $amount }}</div>
    <div>支払い合計： ￥{{ ceil($item->price * $amount *1.1)  }}</div>
    <div>(手数料10％込み)</div>
    <div>コメント：{{ $comment }}</div>
    
    <div class= 'btn btn-lg btn-success'  type="button" onclick="history.back()">戻る
    </div>
    
    {!! Form::open( ['route' => ['requests.store', $otsukai->id]]) !!}
    {!! Form::hidden('item',$item_id, ['class' => 'form-control']) !!}
    {!! Form::hidden('amount', $amount, ['class' => 'form-control']) !!}
    {!! Form::hidden('comment',$comment, ['size' => '50x2']) !!}
    {!! Form::submit('注文確定', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
    
    
@endsection