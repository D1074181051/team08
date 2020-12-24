@extends('app')

@section('title', '新增一筆朝代資料')

@section('theme', '新增一筆朝代資料')

@section('contents')

    @include('message.list')

    {!! Form::open(['url' => 'dynastys/store']) !!}
    <div class="form-group">
        {!! Form::Label('t_name', '朝代名稱:') !!}
        {!! Form::text('t_name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('s_time', '歷經時間(起)(西元):') !!}
        {!! Form::text('s_time', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('e_time', '歷經時間(迄)(西元):') !!}
        {!! Form::text('e_time', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('capital', '舊時首都:') !!}
        {!! Form::text('capital', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('新增朝代', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection
