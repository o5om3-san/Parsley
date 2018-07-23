@extends('layouts.app')
@section('content')


    {!! Form::model($otsukai, ['route' => ['otsukais.update', $otsukai->id], 'method' => 'put']) !!}
    <div class='col-sm-4'> 
        <div class='row shopWrapper new-create-card'>
            <div class='row'>
                <div class='col-xs-3'>
                    <img class='shop-image' src="/images/532.png"  alt="" width='80'>
                </div>
                <div class='col-xs-9'>
                    <div class='shopdetail'>
                        <h2>NEW</h2>
                    </div>
                </div>
            </div>
            <div class='row order_card'>                    
                <table>
                    <tr>
                        <?php $dt = new DateTime(); ?>
                        <td class='d_left'>受付期限：</td>
                        <td class='d_right'>
                            <span class="memo-deadline">
                                {{Form::selectRange('from_hour', $dt->format('H'), 23, substr($otsukai->deadline, 11, 2))}}時
                                <select name="from_minutes">
                                    @for ($i = 0; $i < 12; $i++)
                                         <option value={{$i*5}} <?php if(substr($otsukai->deadline, 14, 2) == $i*5){ echo 'selected'; }?> > {{$i*5}} </option>
                                    @endfor
                                </select>分
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class='d_left'>お店：</td>
                        <td class='d_right'>
                            <select name="shop_id">
                                @foreach ($shops as $shop)
                                    <option value={{$shop->id}} <?php if($otsukai->shop_id == $shop->id){ echo 'selected'; }?> > {{$shop->name}} </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class='d_left'>最大個数：</td>
                        <td class='d_right'>
                            {{Form::selectRange('capacity', 1, 10, $otsukai->capacity)}}個
                        </td>
                    </tr>
                    <tr>
                        <td class='d_left'>受け渡し：</td>
                        <td class='d_right'>
                            キャビネット {{Form::selectRange('deliverPlace', 1, 11, $otsukai->deliverPlace)}}
                        </td>
                    </tr>                   
                </table>    
            </div>     
            <div class="row card_buttons">
                    {!! Form::submit('更新', ['class' => 'btn btn-success', 'onclick' => 'clickEvent()']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection