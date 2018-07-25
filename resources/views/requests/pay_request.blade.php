@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-8 col-xs-offset-1 col-sm-offset-1 col-md-offset-2">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>Parsley</strong>
                        <br>
                        CodeWars
                        <br>
                        <abbr title="Phone" class= 'fas fa-phone'></abbr> (0120) xxx-xxx
                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em></em>
                    </p>
                    <p>
                        <em></em>
                    </p>    
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>{{ $user->name }}さんのお支払い明細</h1>
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>商品名</th>
                            <th>個数</th>
                            <th class="text-center">手数料</th>
                            <th class="text-center">合計</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><em>{{ $item->name }}</em></h4></td>
                            <td class="col-md-1" style="text-align: center">{{ $otsukai_giant->amount }}個</td>
                            <td class="col-md-1 text-center">10%</td>
                            <td class="col-md-1 text-center">￥{{ ceil($item->price * $otsukai_giant->amount *1.1)  }}</td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>小計:</strong>
                            </p>
                            </td>
                            <td class="text-center">
                            <p>
                                <strong>￥{{ ceil($item->price * $otsukai_giant->amount *1.1)  }}</strong>
                            </p>
                            </td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>合計:</strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>￥{{ ceil($item->price * $otsukai_giant->amount *1.1)  }}</strong></h4></td>
                        </tr>
                    </tbody>
                </table>
                    <div class ='pay_button'>
                    {!! Form::model($otsukai_giant, ['route' => ['requests.pay_update', $otsukai_giant->id], 'method' => 'put']) !!}
                    {!! Form::submit('支払い完了報告する', ['class' => 'btn btn-primary btn-m']) !!}
                    </div>
                    <div class = 'pay_button btn btn-m' onClick = 'viber()'>
                        Viberで支払う
                        <script>
                            function viber(){
                                var res = confirm("Viberに移行します");
                                if( res == true ) {
                                    // OKなら移動
                                    location.href = "viber:";
                                    
                                }
                                else {
                                    // キャンセルならアラートボックスを表示
                                    alert("キャンセルしました");
                                    return false;
                                }
                            }
                        </script>
                    </div>
                </div>
                支払いを済ませてから支払い完了報告をしてください。
            </div>
        </div>
    </div>
</div>
@endsection