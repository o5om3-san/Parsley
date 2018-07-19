@extends('layouts.app')

@section('content')
    <h2>以下の内容で、注文を受け付けました。</h2>

    <div>商品名：{{ $item->name }} × {{ $amount }}個</div>
    <div>商品代金： ￥{{ $item->price * $amount }}</div>
    <div>支払い合計： ￥{{ $item->price * $amount *1.1  }}</div>
    <div>(手数料10％込み)</div>
    <div>コメント：{{ $comment }}</div>
   

    {!! link_to_route('requests.create', '戻る', null, ['class' => 'btn btn-lg btn-success']) !!}
    {!! link_to_route('otsukais.index', '注文確定', null, ['class' => 'btn btn-lg btn-success']) !!}
    
@endsection