@foreach ($otsukai_giants as $otsukai_giant)
    <p>のびたなまえ{{ $otsukai_giant->otsukai->user->name }}</p>
    <p>しめきり{{ $otsukai_giant->otsukai->deadline }}</p>
    <p>しょうひんめい{{ $otsukai_giant->item->name }}</p>
    <p>しょうひんかかく{{ $otsukai_giant->item->price }}</p>
    <p>うけとりばしょ{{ $otsukai_giant->otsukai->deliverPlace }}</p><br>
@endforeach

{!! $otsukais->render() !!}