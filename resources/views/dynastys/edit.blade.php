@extends('app')

@section('title', '修改一筆朝代資料')

@section('theme', '修改一筆朝代資料')

@section('contents')

    @include('message.list')

    朝代編號:{{ $id }}<br/>
    {!! Form::open(['url' => 'dynastys/update/' .$id, 'method' => 'patch']) !!}
    <div class="form-group">
        {!! Form::Label('t_name', '朝代名稱:') !!}
        {!! Form::text('t_name', $t_name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('s_time', '歷經時間(起)(西元):') !!}
        {!! Form::text('s_time', $s_time, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('e_time', '歷經時間(迄)(西元):') !!}
        {!! Form::text('e_time', $e_time, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('capital', '舊時首都:') !!}
        {!! Form::text('capital', $capital, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('更新朝代', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection
