@extends('app')

@section('title', '修改一筆朝代資料')

@section('theme', '修改一筆朝代資料')

@section('contents')
    朝代編號:{{ $id }}<br/>
    {!! Form::open(['url' => 'dynastys/update/' .$id, 'method' => 'patch']) !!}
    <div class="form-group">
        {!! Form::Label('t_name', '朝代名稱:') !!}
        {!! Form::text('t_name', $t_name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('vids', '歷經時間(西元):') !!}
        {!! Form::text('vids', $vids, ['class' => 'form-control']) !!}
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
