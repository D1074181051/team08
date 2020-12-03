@extends('app')

@section('title', '修改一筆古物資料')

@section('theme', '修改一筆古物資料')

@section('contents')
    古物編號:{{$id}}<br/>
    {!! Form::open(['url' => 'antiques/update/' . $id, 'method' => 'patch']) !!}
    <div class="form-group">
        {!! Form::Label('p_name', '古物名稱:') !!}
        {!! Form::text('p_name', $p_name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('dynasty_ID', '朝代編號:') !!}
        {!! Form::text('dynasty_ID', $dynasty_ID, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('location', '收藏地(所在地):') !!}
        {!! Form::text('location', $location, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('long', '長(以公尺為標準):') !!}
        {!! Form::text('long', $long, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('width', '寬(以公尺為標準):') !!}
        {!! Form::text('width', $width, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('更新古物', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection
