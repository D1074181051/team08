@extends('app')

@section('title', '新增一筆朝代資料')

@section('theme', '新增一筆朝代資料')

@section('contents')
    編號:{{$id}}<br/>
    朝代 :{{$t_name}}<br/>
    歷經時間(西元) :{{$vids}}<br/>
    舊時首都 :{{$capital}}<br/>
@endsection
