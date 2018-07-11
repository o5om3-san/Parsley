@extends('layouts.app')

@section('content')
        <h1>おつかい編集ページ</h1>
            {!! Form::model($otsukai, ['route' => ['otsukais.update', $otsukai->id], 'method' => 'put']) !!}
            
            <div class="form-group">
                <?php $dt = new DateTime(); ?>
                {!! Form::label('deadline', 'Deadline:') !!}
                {{Form::selectRange('from_hour', $dt->format('H'), 24, '', ['placeholder' => ''])}}時
                <select name="from_minutes">
                    @for ($i = 0; $i < 12; $i++)
                      <option value={{$i*5}}> {{$i*5}} </option>
                    @endfor
                </select>
            </div>
                
            <div class="form-group">
                {!! Form::label('shop_id', 'Shop:') !!}
                <select name="shop_id">
                    @foreach ($shops as $shop)
                      <option value={{$shop->id}}> {{$shop->name}} </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                {!! Form::label('deliverPlace', 'DeliverPlace:') !!}
                {!! Form::text('deliverPlace', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}
        
            {!! Form::close() !!}
@endsection

