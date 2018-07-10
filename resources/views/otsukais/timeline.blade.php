<ul class="media-list">
@foreach ($otsukais as $otsukai)
    <?php $user = $otsukai->user; ?>
    <?php
     $unixtimeA = strtotime("".$otsukai->deadline);
     $unixtimeB = strtotime("now");
    ?>
    @if($unixtimeA-$unixtimeB > 0)

    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="https://stamp-mato.me/wp-content/uploads/2016/10/okaimono-panda_c.jpg" height='15%' alt="">
            {{ $otsukai->user->name }}
        </div>
        <div class="media-body">
            <div>
                <span class="text-muted">Dead Line: <?php echo date("H:i", strtotime($otsukai->deadline)); ?></span><br>
                <span class="text-muted">Shop: {{ $otsukai->shop->name }}</span><br>
                <span class="text-muted">Capacity: {{ $otsukai->capacity }}</span><br>
                <span class="text-muted">Place: {{ $otsukai->deliverPlace }}</span><br>

            </div>
            <div>
                {!! link_to_route('otsukais.request', 'Request', ['id' => $otsukai->id], ['class' => 'btn btn-default btn-xs']) !!}
                @if (Auth::user()->id == $otsukai->user_id)
                    {!! Form::open(['route' => ['otsukais.destroy', $otsukai->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
    @endif
@endforeach
</ul>
{!! $otsukais->render() !!}