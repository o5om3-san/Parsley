@extends('layouts.app')

@section('content')
<body>
   <div class="row">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-2 col-md-offset-8 col-lg-offset-3 col-lg-6">
            <h1>新しいおつかい</h1>
    
            {!! Form::model($otsukai, ['route' => 'otsukais.confirm_create_otsukai']) !!}
            
                <div class="form-group">
                    <?php
                        $dt = new DateTime();
                        $hour = $dt->format('H');
                        $minute = $dt->format('i');
                        if($dt->format('i') > 40){ $hour = $hour+1; }
                        
                    ?>
                    {!! Form::label('deadline', '受け入れ期限：') !!}
                    {{Form::selectRange('from_hour', $hour, 23, $hour)}}時
                    <select name="from_minutes">[
                        @for ($i = 0; $i < 12; $i++)
                            <option value={{$i*5}} <?php if(ceil($minute/5) == $i-3){ echo 'selected'; } else if(ceil($minute/5)-9 == $i){ echo 'selected'; } ?> > {{$i*5}} </option>
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
                    {{Form::selectRange('capacity', 1, 10, 1)}}個
                </div>
                <div class="form-group">
                    {!! Form::label('deliverPlace', '受け渡し場所：') !!}
                    Cabinet{{Form::selectRange('deliverPlace', 1, 11, 1)}}
                </div>
                
                {!! Form::submit('登録', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</body>
@endsection