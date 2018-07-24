@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            <h1>{{ $otsukai->user->name }} のおつかい詳細</h1>
            <table class="table table-bordered">
                <tr>
                    <th>受け入れ期限</th>
                    <td><?php echo date("H:i", strtotime($otsukai->deadline)); ?></td>
                </tr>
                <tr>
                    <th>お店</th>
                    <td>{{ $otsukai->shop->name }}</td>
                </tr>
                <tr>
                    <th>受け渡し場所</th>
                    <td>キャビネット{{ $otsukai->deliverPlace }}</td>
                </tr>
            </table>
             <table class="table table-bordered">
                <tr>
                    <th>依頼者</th>
                    @foreach ($onegais as $onegai)
                        <td>
                            <div class="iraisha">
                                名前：{{ $onegai->user->name }}<br>
                                商品：{{ $onegai->item->name }}<br>
                                数量：{{ $onegai->amount }}<br>
                                コメント：{{ $onegai->comment }}<br>
                            </div>
                            <div class="editbutton" text-center>
                                @if (Auth::user()->id == $onegai->user_id)
                                    {!! link_to_route('requests.edit', '編集', ['id' => $onegai->id], ['class' => 'btn btn-default btn-xs']) !!}
                                    {!! Form::open(['route' => ['requests.destroy', $onegai->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </td>
                    @endforeach
                </tr>
            </table>
            
            <div class='buttons'>
                @if (Auth::user()->id == $otsukai->user_id)
                    {!! link_to_route('otsukais.edit', '編集', ['id' => $otsukai->id], ['class' => 'btn btn-default']) !!}
                    {!! Form::model($otsukai, ['route' => ['otsukais.destroy', $otsukai->id], 'method' => 'delete']) !!}
                        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                @endif
                @if (Auth::user()->id != $otsukai->user_id)
                    @if ($otsukai->capacity-$amount > 0)
                        {!! link_to_route('requests.create', '注文する', ['id' => $otsukai->id], ['class' => 'btn btn-success']) !!}
                    @endif
                @endif
                {!! link_to_route('otsukais.index', '戻る', [], ['class' => 'btn btn-default']) !!}
            </div>
        </div>
    </div>
@endsection