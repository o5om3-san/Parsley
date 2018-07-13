<table class="medialist">
　<thead>
    <tr>
    　<th>ショッパー</th>
      <th>受け入れ期限</th>
      <th>お店</th>
    　<th>最大個数</th>
    　<th>受け渡し場所</th>
    </tr>
　</thead>
　
@foreach ($otsukais as $otsukai)
    <?php $user = $otsukai->user; ?>
        
　　<tbody="type06">
  
        <td>
            <div class="media-left">
                <img class="media-object img-rounded" src="https://stamp-mato.me/wp-content/uploads/2016/10/okaimono-panda_c.jpg" height='15%' alt="">
                {{ $otsukai->user->name }}
            </div>
        </td>
        <td><?php echo date("H:i", strtotime($otsukai->deadline)); ?></td>
        <td>{{ $otsukai->shop->name }}</td>
        <td>{{ $otsukai->capacity }}</td>
        <td>Cabinet {{ $otsukai->deliverPlace }}</td>
        <td>
            
            @if (Auth::user()->id != $otsukai->user_id)
                {!! link_to_route('otsukais.show', 'おつかいを頼む', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
            @endif
            
            @if (Auth::user()->id == $otsukai->user_id)
                {!! link_to_route('otsukais.show', '詳細', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
            @endif
        </td>

   </tbody>
@endforeach
</table>
{!! $otsukais->render() !!}