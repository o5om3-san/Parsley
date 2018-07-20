@extends('layouts.app')

@section('content')
        <h1>おつかい編集ページ</h1>
            {!! Form::model($otsukai, ['route' => ['otsukais.update', $otsukai->id], 'method' => 'put']) !!}
            
            <div class="form-group">
                <?php $dt = new DateTime(); ?>
                {!! Form::label('deadline', 'Deadline:') !!}
                {{Form::selectRange('from_hour', $dt->format('H'), 23, substr($otsukai->deadline, 11, 2))}}時
                <select name="from_minutes">
                    @for ($i = 0; $i < 12; $i++)
                      <option value={{$i*5}} <?php if(substr($otsukai->deadline, 14, 2) == $i*5){ echo 'selected'; }?> > {{$i*5}} </option>
                    @endfor
                </select>
            </div>
                
            <div class="form-group">
                {!! Form::label('shop_id', 'Shop:') !!}
                <select name="shop_id">
                    @foreach ($shops as $shop)
                      <option value={{$shop->id}} <?php if($otsukai->shop_id == $shop->id){ echo 'selected'; }?> > {{$shop->name}} </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                {!! Form::label('capacity', 'Capacity:') !!}
                {{Form::selectRange('capacity', 1, 10, $otsukai->capacity)}}個
            </div>
            
            <div class="form-group">
                {!! Form::label('deliverPlace', '受け渡し場所：') !!}
                Cabinet{{Form::selectRange('deliverPlace', 1, 11, $otsukai->deliverPlace)}}
            </div>

            {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}
        
            {!! Form::close() !!}
@endsection

