@extends('app')

@section('title', '一筆古物資料')

@section('theme', '一筆古物資料')

@section('contents')
    編號:{{$antique->id}}<br/>
    古物:{{$antique->p_name}}<br/>
    朝代:{{$dynasty_name}}<br/>
    收藏地(所在地):{{$antique->location}}<br/>
    長(以公尺為標準):{{$antique->long}}<br/>
    寬(以公尺為標準):{{$antique->width}}<br/>
@endsection
