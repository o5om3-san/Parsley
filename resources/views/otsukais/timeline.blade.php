<ul class="media-list">
@foreach ($otsukais as $otsukai)
    <?php $user = $otsukai->user; ?>
    <li class="media">
        <div class="media-left">
            <img class="media-object img-rounded" src="https://www.google.co.jp/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwi2jZiNqIncAhUKzbwKHZRZBR4QjRx6BAgBEAU&url=https%3A%2F%2Fevent.rakuten.co.jp%2Fgroup%2Fpandafullife%2F&psig=AOvVaw0A1QYiXb5aO8MY1wXlKKZ0&ust=1530926585770840" alt="">
        </div>
        <div class="media-body">
            <div>
                <span class="text-muted">posted at {{ $otsukai->deadline }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($otsukai->content)) !!}</p>
            </div>
            <div>
                @if (Auth::user()->id == $otsukai->user_id)
                    {!! Form::open(['route' => ['otsukais.destroy', $otsukai->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $otsukais->render() !!}