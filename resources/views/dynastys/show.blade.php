@extends('app')

@section('title', '一筆朝代資料')

@section('theme', '一筆朝代資料')

@section('contents')
    編號:{{$dynasty->id}}<br/>
    朝代 :{{$dynasty->t_name}}<br/>
    歷經時間(起)(西元) :{{$dynasty->s_time}}<br/>
    歷經時間(迄)(西元) :{{$dynasty->e_time}}<br/>
    舊時首都 :{{$dynasty->capital}}<br/>

<div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-1">
    {{$dynasty->t_name}}所有古物
</div>
<table>
    <tr>
        <th>古物編號</th>
        <th>古物姓名</th>
        <th>收藏地(所在地)</th>
        <th>長(以公尺為標準)</th>
        <th>寬(以公尺為標準)</th>
    </tr>
    @foreach($antiques as $antique)
        <tr>
            <td>{{$antique->id}}</td>
            <td>{{$antique->p_name}}</td>
            <td>{{$antique->location}}</td>
            <td>{{$antique->long}}</td>
            <td>{{$antique->width}}</td>
        </tr>
    @endforeach
</table>

@endsection
