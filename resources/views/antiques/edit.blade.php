@extends('app')

@section('title', '修改一筆古物資料')

@section('theme', '修改一筆古物資料')

@section('contents')
    編號:{{$id}}<br/>
    古物:{{$p_name}}<br/>
    朝代編號:{{$dynasty_ID}}<br/>
    收藏地(所在地):{{$location}}<br/>
    長(以公尺為標準):{{$long}}<br/>
    寬(以公尺為標準):{{$width}}<br/>
@endsection
