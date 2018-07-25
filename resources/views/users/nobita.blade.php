<table class="table-hover hidden-xs hidden-sm">
　<thead>
    <tr>
      <th>受付期限</th>
      <th>お店</th>
    　<th>最大個数</th>
    　<th>受け渡し場所</th>
    　<th></th>
    　<th></th>
    </tr>
　</thead>
　
    @foreach ($otsukais as $otsukai)
        <?php $user = $otsukai->user; ?>
    　　<tbody>
            <td>{{ substr($otsukai->deadline, 0, 16) }}</td>
            <td>{{ $otsukai->shop->name }}</td>
            <td>{{ $otsukai->capacity }}</td>
            <td>キャビネット {{ $otsukai->deliverPlace }}</td>
            <td>
                @if ($otsukai->closed == 0)
                    <div class=mypage-button>
                        {!! link_to_route('otsukais.show', '詳細/編集', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                        {!! link_to_route('line.notify', '到着通知', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                        {!! link_to_route('otsukais.complete', 支払確認', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                    </div>
                @else
                    取引完了
                @endif
            </td>
       </tbody>
    @endforeach
</table>
            <div class = 'row_nobita'>
                <div class='card_row order_card visible-sm visible-xs'>
                    @foreach ($otsukais as $otsukai)<hr>
                            <div>　受付時間　：<span class="memo-deadline"><?php echo date ("H:i", strtotime($otsukai->deadline)); ?></span></div>
                            <div>　お店　　　： {{ $otsukai->shop->name }}</div>
                            <div>　最大個数　：{{$otsukai->capacity}}個まで</div>
                            <div>　手渡す場所： キャビネット {{ $otsukai->deliverPlace }}</div>
                            <div>
                                @if ($otsukai->closed == 0)
                                    <div class='mypage-button nobita_button'>
                                    {!! link_to_route('otsukais.show', '詳細', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                                    {!! link_to_route('line.notify', '到着通知', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                                    {!! link_to_route('otsukais.complete', '支払確認', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                                    </div>
                                @else
                                    <div class=done><strong>取引完了</strong></div>
                                @endif
                            </div>
                    @endforeach
                </div>
            </div>
{!! $otsukais->render() !!}