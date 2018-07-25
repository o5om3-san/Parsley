@extends('layouts.app')

@section('content')

<link href="css/timeline.css" rel="stylesheet" type="text/css">

　<center><h1>おつかいに行く？おつかいを頼む？</h1></center>
    <div class="row">
        <div class='col-sm-4'>
            <div class='shopWrapper new-create-card'>
                <div class='row'>
                    <div class='col-xs-3'>
                        <img class='shop-image' src="images/532.png"  alt="" width='80'>
                    </div>
                    <div class='col-xs-9'>
                        <div class='shopdetail'>
                            <h3>自分が買いに行く</h3><span class ='time'>　　　　　</span>
                        </div>
                    </div>
                </div>
            <div class='card_row'>
                {!! Form::model($otsukai, ['route' => 'otsukais.store']) !!}                
                <table>
                    <tr>
                        <?php
                        $dt = new DateTime();
                        $hour = $dt->format('H');
                        $minute = $dt->format('i');
                        if($dt->format('i') > 40){ $hour = $hour+1; }
                        ?>
                        <td class='d_left'>出発時間：</td>
                        <td class='d_right'>
                            <span class="memo-deadline">
                            {{Form::selectRange('from_hour', $hour, 23, $hour)}}時
                                <select name="from_minutes">
                                    @for ($i = 0; $i < 12; $i++)
                                         <option value={{$i*5}} <?php if(ceil($minute/5) == $i-3){ echo 'selected'; } else if(ceil($minute/5)-9 == $i){ echo 'selected'; } ?> > {{$i*5}} </option>
                                    @endfor
                                </select>
                                分
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class='d_left'>買いに行く店：</td>
                        <td class='d_right'>
                            <select name="shop_id">
                                @foreach ($shops as $shop)
                                    <option value={{$shop->id}}> {{$shop->name}} </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class='d_left'>受付個数：</td>
                        <td class='d_right'>
                            {{Form::selectRange('capacity', 1, 10, 1)}}個
                        </td>
                    </tr>
                    <tr>
                        <td class='d_left'>手渡す場所：</td>
                        <td class='d_right'>
                            キャビネット {{Form::selectRange('deliverPlace', 1, 11, 1)}}
                        </td>
                    </tr>                   
                </table>    
            </div>
            <div class="row card_button">
                {!! Form::submit('おつかいに行く', ['class' => 'btn btn-default btn_link', 'onclick' => 'clickEvent()']) !!}
            </div>
        </div>
    </div>     
   
    @foreach ($otsukais as $key => $otsukai)
        <?php
            $user = $otsukai->user;
            if ($otsukai->user_id == \Auth::id()){
                echo "<style> .card_items".$otsukai->id."{ background-color: pink; } </style>";
            }
        ?>
        <div class='col-sm-4'>
            <div class='shopWrapper card_items<?= $otsukai->id ?>'>
                <div class='row'>
                    <div class='col-xs-3'>
                        <img class='shop-image' src="images/532.png"  alt="" width='80'>
                    </div>
                    <div class='col-xs-9'>
                        <div class='shopdetail'>
                            @if ($otsukai->user_id == \Auth::id())
                               <h2>{{ $otsukai->user->name }}</h2><span class ='time'>　　　　　</span>
                            @else 
                               <h2>{{ $otsukai->user->name }}</h2><span class ='time'>さんに頼む</span>
                            @endif
                        </div>
                    </div>
                </div>                 
                <div class='card_row order_card'>                    
                    <table>
                        <tr>
                            <td class='d_left'>　出発時間：</td>
                            <td class='d_right'>　<span class="memo-deadline"><?php echo date ("H:i", strtotime($otsukai->deadline)); ?></span></td>
                        </tr>
                        <tr>
                            <td class='d_left'>　買いに行く店：</td>
                            <td class='d_right'>　{{ $otsukai->shop->name }}</td>
                        </tr>
                        <tr>
                            <td class='d_left'>　受付個数：</td>
                            <td class='d_right'>
                                <span class="nokori">　
                                    {{$otsukai->capacity-$amounts[$key]}}個まで
                                </span>
                            </td>
                        </tr>
                         <tr>
                            <td class='d_left'>　手渡す場所：</td>
                            <td class='d_right'>　キャビネット {{ $otsukai->deliverPlace }}</td>
                        </tr>                   
                    </table>    
                </div>     
                <div class="row card_button">
                @if (Auth::user()->id !== $otsukai->user_id)
                            {!! link_to_route('requests.create', 'おつかいを頼む', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs tl_buttons']) !!}
                @endif
                </div>
                @if (Auth::user()->id == $otsukai->user_id)
                    <div class="card_button">
                        {!! link_to_route('otsukais.show', '詳細', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs tl_buttons']) !!}
                    </div>
                @endif
            </div>
        </div>
    @endforeach
    
@endsection