<table class="table-hover">
    <thead>
        <tr>
            <th>買いに行く人</th>
            <th>受付期限</th>
            <th>商品名</th>
            <th>価格</th>
            <th>受け取り場所</th>
            <th>リクエスト日時</th>
            <th>　</th>
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
{!! $otsukais->render() !!}