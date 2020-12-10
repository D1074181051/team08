@extends('app')

@section('title', '建立古物表單')

@section('theme', '建立古物的表單')

@section('contents')
    {!! Form::open(['url' => 'antiques/store']) !!}

    @include('antiques.form', ['submitButtonText' => "新增古物資料"])

    {!! Form::close() !!}

@endsection
