@foreach ($otsukai_giants as $otsukai_giant)
    <p>依頼主{{ $otsukai_giant->otsukai->user->name }}</p>
    <p>締め切り{{ $otsukai_giant->otsukai->deadline }}</p>
    <p>商品名{{ $otsukai_giant->item->name }}</p>
    <p>商品価格{{ $otsukai_giant->item->price }}</p>
    <p>受け取り場所{{ $otsukai_giant->otsukai->deliverPlace }}</p><br>
@endforeach

{!! $otsukais->render() !!}