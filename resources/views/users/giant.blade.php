<table class="table-hover">
　<thead>
    <tr>
    　<th>ショッパー</th>
      <th>受付期限</th>
      <th>商品名</th>
    　<th>価格</th>
    　<th>受け取り場所</th>
    </tr>
　</thead>
@foreach ($otsukai_giants as $otsukai_giant)　
　<tbody>
　    <td>{{ $otsukai_giant->otsukai->user->name }}</td>
　    <td>{{ $otsukai_giant->otsukai->deadline }}</td>
　    <td>{{ $otsukai_giant->item->name }}</td>
　    <td>{{ $otsukai_giant->item->price }}</td>
　    <td>キャビネット{{ $otsukai_giant->otsukai->deliverPlace }}</td>
　</tbody>
@endforeach
</table>
{!! $otsukais->render() !!}