@extends('layouts.app')

@section('content')


{!! Form::open( ['route' => ['requests.confirm_edit_request', $onegai->id]]) !!}

    <div class='col-sm-4'>    
        <div class='row shopWrapper new-create-card'>
            <div class='row'>
                <div class='col-xs-3'>
                    <img class='shop-image' src="/images/532.png"  alt="" width='80'>
                </div>
                <div class='col-xs-9'>
                    <div class='shopdetail'>
                        <h2>注文編集</h2>
                    </div>
                </div>
            </div>
            <div class='row order_card'>                    
                <table>
                    <tr>
                        <td class='d_left'>商品：</td>
                        <td class='d_right'>
                                <select name='item'>
                                    @foreach ($items as $item)
                                        <option value={{$item->id}} <?php if($onegai->item_id == $item->id){ echo 'selected'; }?> > {{ $item->name }} </option>
                                    @endforeach
                                </select>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class='d_left'>注文数：</td>
                        <td class='d_right'>
                                {!! Form::selectRange('amount', 1, $otsukai->capacity-$amount+$onegai->amount, $onegai->amount) !!}
                        </td>
                    </tr>
                    <tr>
                        <td class='d_left'>コメント：</td>
                        <td class='d_right'>
                            {!! Form::textarea('comment', $onegai->comment, ['size' => '25x1']) !!}
                        </td>
                    </tr>                   
                </table>    
            </div>     
            <div class="row card_buttons">
                    {!! Form::submit('更新', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
    
@endsection