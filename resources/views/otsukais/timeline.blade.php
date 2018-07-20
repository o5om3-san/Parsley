@extends('layouts.app')

@section('content')

<link href="css/timeline.css" rel="stylesheet" type="text/css">

<div class="row">
    @foreach ($otsukais as $key => $otsukai)
        <?php $user = $otsukai->user; ?>
        <div class='col-sm-4'>
            <div class='shopWrapper'>
                
                <div class='row'>
                    <div class='col-xs-3'>
                        <img class='shop-image' src="images/532.png"  alt="" width='80'>
                    </div>
                    <div class='col-xs-9'>
                        <div class='shopdetail'>
                           <h2>{{ $otsukai->user->name }}</h2>
                        </div>
                    </div>
                </div>                 
                
                <div class='row'>                    
                    <table>
                        <tr>
                            <td class='d_left'>受付期限：</td>
                            <td class='d_right'><span class="memo-deadline"><?php echo date ("H:i", strtotime($otsukai->deadline)); ?></span> まで</td>
                        </tr>
                        <tr>
                            <td class='d_left'>お店：</td>
                            <td class='d_right'>{{ $otsukai->shop->name }}</td>
                        </tr>
                        <tr>
                            <td class='d_left'>最大個数：</td>
                            <td class='d_right'>{{ $amounts[$key] }}／{{ $otsukai->capacity }}</td>
                        </tr>
                         <tr>
                            <td class='d_left'>受け渡し：</td>
                            <td class='d_right'>キャビネット {{ $otsukai->deliverPlace }}</td>
                        </tr>                   
                    </table>    
                </div>     
                <div class="row card_buttons">
                    @if (Auth::user()->id != $otsukai->user_id)
                        {!! link_to_route('otsukais.show', '詳細', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                        @if ($otsukai->capacity-$amounts[$key] > 0)
                            {!! link_to_route('requests.create', 'おつかいを頼む', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                        @endif
                    @endif
                </div>
         
                @if (Auth::user()->id == $otsukai->user_id)
                    <div class="card_button">
                        {!! link_to_route('otsukais.show', '詳細', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                    </div>
                @endif
            </div>
        </div>
    @endforeach
    
    <div class='col-sm-4'>
        <div class='row shopWrapper new-create-card'>
            <div class='row'>
                <div class='col-xs-3'>
                    <img class='shop-image' src="images/532.png"  alt="" width='80'>
                </div>
                <div class='col-xs-9'>
                    <div class='shopdetail'>
                        <h2>NEW</h2>
                    </div>
                </div>
            </div>
        <div class='row'>                    
            <table>
                <tr>
                    <td class='d_left'>受付期限：</td>
                    <td class='d_right new-card'>　</td>
                </tr>
                <tr>
                    <td class='d_left'>お店：</td>
                    <td class='d_right new-card'>　</td>
                </tr>
                <tr>
                    <td class='d_left'>最大個数：</td>
                    <td class='d_right new-card'>　</td>
                </tr>
                <tr>
                    <td class='d_left'>受け渡し：</td>
                    <td class='d_right new-card'>　</td>
                </tr>                   
            </table>    
        </div>
        <div class="row card_button">
            {!! link_to_route('otsukais.create', 'つくる', null, ['class' => 'btn btn-default btn-xs']) !!}
        </div>
    </div>
</div>

{!! $otsukais->render() !!}

@endsection