@extends('layouts.app')

@section('content')
<div class="row">       
 <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
  
    <h1>{{ $otsukai->user->name }} のおつかい詳細ページ</h1>

    
    <table class="table table-bordered">
        <tr>
            <th>deadline</th>
            <td><?php echo date("H:i", strtotime($otsukai->deadline)); ?></td>
        </tr>
        <tr>
            <th>shop</th>
            <td>{{ $otsukai->shop->name }}</td>
        </tr>
        <tr>
            <th>giant</th>
            @foreach ($otsukai_giants as $otsukai_giant)
                <td>{{ $otsukai_giant->user->name }}/{{ $otsukai_giant->item->name }}</td>
            @endforeach
        </tr>
        <tr>
            <th>deliverplace</th>
            <td>{{ $otsukai->deliverPlace }}</td>
        </tr>
    </table>

    {!! link_to_route('otsukais.edit', '編集', ['id' => $otsukai->id], ['class' => 'btn btn-default']) !!}
    {!! Form::model($otsukai, ['route' => ['otsukais.destroy', $otsukai->id], 'method' => 'delete']) !!}
     {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
</div>
@endsection
 </div>