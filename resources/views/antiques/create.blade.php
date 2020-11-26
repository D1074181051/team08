@extends('app')

@section('title', '新增一筆古物資料')

@section('theme', '新增一筆古物資料')

@section('contents')
    {!! Form::open(['url' => 'antiques/store']) !!}
    <div class="form-group">
        {!! Form::Label('p_name', '古物名稱:') !!}
        {!! Form::text('p_name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('dynasty_ID', '朝代編號:') !!}
        {!! Form::text('dynasty_ID', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('location', '收藏地(所在地):') !!}
        {!! Form::text('location', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('long', '長(以公尺為標準):') !!}
        {!! Form::text('long', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::Label('width', '寬(以公尺為標準):') !!}
        {!! Form::text('width', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('新增古物', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

@endsection
