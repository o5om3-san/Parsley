@extends('layouts.app')

@section('content')
    <h1>おつかいの支払い状況</h1>
    
    <table class="table-hover">
    　<thead>
        <tr>
            <th>ニックネーム</th>
            <th>品物</th>
            <th>点数</th>
            <th>金額</th>
            <th>ステータス</th>
            <th></th>
        </tr>
    　</thead>
    　
        @foreach ($onegais as $onegai)
        　　<tbody="type05">
                <td>{{ $onegai->user->name }}</td>
                <td>{{ $onegai->item->name }}</td>
                <td>{{ $onegai->amount }}</td>
                <td>￥{{ ceil($onegai->item->price * $onegai->amount *1.1)  }}</td>
                <td>
                    @if ($onegai->paid == 0)
                        未払い
                    @else
                        支払い済
                    @endif
                </td>
            </tbody>
        @endforeach
    </table>
    @if ($otsukai->closed == 0)
        {!! Form::model($otsukai, ['route' => ['otsukais.complete_update', $otsukai->id], 'method' => 'put']) !!}
            {!! Form::submit('取引終了', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    @endif
@endsection