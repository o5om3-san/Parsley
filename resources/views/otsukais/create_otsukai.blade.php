@extends('layouts.app')

@section('content')

   <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-offset-8 col-lg-offset-3 col-lg-6">
            <h1>新しいおつかい</h1>
    
            {!! Form::model($otsukai, ['route' => 'otsukais.store']) !!}
            
            <div class="form-group">
                <?php $dt = new DateTime(); ?>
                {!! Form::label('deadline', '受け入れ期限：') !!}
                {{Form::selectRange('from_hour', $dt->format('H'), 23, ['placeholder' => ''])}}時
                <select name="from_minutes">
                    @for ($i = 0; $i < 12; $i++)
                      <option value={{$i*5}}> {{$i*5}} </option>
                    @endfor
                </select>
                分
            </div>
            
            <div class="form-group">
                {!! Form::label('shop_id', 'お店：') !!}
                <select name="shop_id">
                    @foreach ($shops as $shop)
                      <option value={{$shop->id}}> {{$shop->name}} </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                {!! Form::label('capacity', '最大：') !!}
                {{Form::selectRange('capacity', 1, 10, '', ['placeholder' => ''])}}個
            </div>
            <div class="form-group">
                {!! Form::label('deliverPlace', '受け渡し場所：') !!}
                Cabinet{{Form::selectRange('deliverPlace', 1, 11, ['selected' => ' '])}}
            </div>
            
            {!! Form::submit('登録', ['class' => 'btn btn-success']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
@endsection