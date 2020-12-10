@extends('app')

@section('title', '修改一筆古物資料')

@section('theme', '修改一筆古物資料')

@section('contents')

    {!! Form::model($antique, ['method' => 'PATCH', 'action' => ['\App\Http\Controllers\AntiquesController@update', $antique->id]]) !!}

    @include('antiques.form', ['submitButtonText' => "更新古物資料"])

    {!! Form::close() !!}
@endsection
