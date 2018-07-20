<table class="table-hover">
　<thead>
    <tr>
    　<th>ショッパー</th>
      <th>受付期限</th>
      <th>商品名</th>
    　<th>価格(手数料込）</th>
    　<th>受け取り場所</th>
    　<th></th>
    </tr>
　</thead>
@foreach ($otsukai_giants as $otsukai_giant)　
　<tbody="type05">
　    <td>{{ $otsukai_giant->otsukai->user->name }}</td>
　    <td>{{ $otsukai_giant->otsukai->deadline }}</td>
　    <td>{{ $otsukai_giant->item->name }} x {{ $otsukai_giant->amount }}</td>
　    <td>{{ $otsukai_giant->item->price * ceil($otsukai_giant->amount*1.1) }}</td>
　    <td>キャビネット{{ $otsukai_giant->otsukai->deliverPlace }}</td>
　    <td>
        {!! link_to_route('requests.pay', '支払う', ['id' => $otsukai_giant->id], ['class' => 'btn btn-default btn-xs']) !!}
      </td>
　</tbody>
@endforeach
</table>
{!! $otsukais->render() !!}