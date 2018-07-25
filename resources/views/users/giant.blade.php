<table class="table-hover hidden-xs hidden-sm">
    <thead>
        <tr>
            <th>買いに行く人</th>
            <th>受付期限</th>
            <th>商品名</th>
            <th>価格</th>
            <th>受け取り場所</th>
            <th>リクエスト日時</th>
            <th></th>
        </tr>
    </thead>
    @foreach ($otsukai_giants as $otsukai_giant)　
        <tbody>
            <td>{{ $otsukai_giant->otsukai->user->name }}</td>
            <td>{{ substr($otsukai_giant->otsukai->deadline, 0, 16) }}</td>
            <td>{{ $otsukai_giant->item->name }}</td>
            <td>{{ $otsukai_giant->item->price }}</td>
            <td>キャビネット{{ $otsukai_giant->otsukai->deliverPlace }}</td>
            <td>{{ substr($otsukai_giant->created_at, 0, 16) }}</td>
            <td>
                <div class=mypage-button>
                    @if($otsukai_giant->paid == 0)
                        {!! link_to_route('requests.edit', '編集', ['id' => $otsukai_giant->id], ['class' => 'btn btn-default btn-xs']) !!}
                        {!! link_to_route('requests.pay', '支払う', ['id' => $otsukai_giant->id], ['class' => 'btn btn-default btn-xs']) !!}
                    @else
                        支払い済
                    @endif
                </div>
            </td>
        </tbody>
    @endforeach
</table>

<div class = 'row_giant'>
                <div class='card_row order_card visible-sm visible-xs'>
                    @foreach ($otsukai_giants as $otsukai_giant)<hr>
                            <div>　買いに行く人　：{{ $otsukai_giant->otsukai->user->name }}</div>
                            <div>　受付期限　　　：{{ substr($otsukai_giant->otsukai->deadline, 0, 16) }}</div>
                            <div>　商品名　　　　：{{ $otsukai_giant->item->name }}</div>
                            <div>　価格　　　　　：{{ $otsukai_giant->item->price }}</div>
                            <div>　手渡す場所　　：キャビネット{{ $otsukai_giant->otsukai->deliverPlace }}</div>
                            <div>　リクエスト日時:{{ substr($otsukai_giant->created_at, 0, 16) }}</div>
                            <div>
                                @if ($otsukai_giant->closed == 0)
                                    <div class='mypage-button giant_button'>
                                        {!! link_to_route('requests.edit', '編集', ['id' => $otsukai_giant->id], ['class' => 'btn btn-default btn-xs']) !!}
                                        {!! link_to_route('requests.pay', '支払う', ['id' => $otsukai_giant->id], ['class' => 'btn btn-default btn-xs']) !!}
                                    </div>
                                @else
                                    <div class=done><strong>支払い済</strong></div>
                                @endif
                            </div>
                    @endforeach
                </div>
            </div>
{!! $otsukais->render() !!}