<table class="medialist">
@foreach ($otsukai_giants as $otsukai_giant)
    <?php $user = $otsukai_giant->user; ?>
        
　　<tbody="type06">
        <td>
            <div class="media-left">
                <img class="media-object img-rounded" src="https://stamp-mato.me/wp-content/uploads/2016/10/okaimono-panda_c.jpg" height='15%' alt="">
                {{ $otsukai_giant->user->name }}
            </div>
        </td>
        <p>のびたなまえ{{ $otsukai_giant->otsukai->user->name }}</p>
        <p>しめきり{{ $otsukai_giant->otsukai->deadline }}</p>
        <p>しょうひんめい{{ $otsukai_giant->item->name }}</p>
        <p>しょうひんかかく{{ $otsukai_giant->item->price }}</p>
        <p>うけとりばしょ{{ $otsukai_giant->otsukai->deliverPlace }}</p>
        <td><?php echo date("H:i", strtotime($otsukai_giant->created_at)); ?></td>
        <td>{{ $otsukai_giant->user_id}}</td>

   </tbody>
@endforeach
</table>
{!! $otsukais->render() !!}