<table class="table-hover">
　<thead>
    <tr>
      <th>受付期限</th>
      <th>お店</th>
    　<th>最大個数</th>
    　<th>受け渡し場所</th>
    　<th> </th>
    </tr>
　</thead>
　
    @foreach ($otsukais as $otsukai)
        <?php $user = $otsukai->user; ?>
    　　<tbody="type05">
            <td>{{ substr($otsukai->deadline, 0, 16) }}</td>
            <td>{{ $otsukai->shop->name }}</td>
            <td>{{ $otsukai->capacity }}</td>
            <td>キャビネット {{ $otsukai->deliverPlace }}</td>
            <td>
                {!! link_to_route('otsukais.show', '編集', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                {!! link_to_route('line.notify', '到着をお知らせする', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                @if ($otsukai->closed == 0)
                    {!! link_to_route('otsukais.complete', '状態の確認', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                @endif
            </td>
       </tbody>
    @endforeach
</table>
{!! $otsukais->render() !!}