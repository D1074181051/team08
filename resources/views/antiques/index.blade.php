@extends('app')

@section('title', '所有古物')

@section('theme', '所有古物資料')

@section('contents')
    <a style="color: fuchsia" href="{{route('antiques.create')}}">新增古物</a>
    <a style="color: fuchsia" href="{{route('antiques.index')}}">所有古物</a>
    <a style="color: fuchsia" href="{{route('antiques.small')}}">查詢小型古物</a>
    <form action="{{ url('antiques/location') }}" method='POST'>
        {!! Form::label('pos', '選取位置') !!}
        {!! Form::select('pos', $locations, ['class' => 'form-control']) !!}
        <input class="btn btn-default" type="submit" value="查詢" />
        @csrf
    </form>
    <table>
        <tr>
            <th>編號</th>
            <th>古物</th>
            <th>朝代</th>
            <th>收藏地(所在地)</th>
            <th>長(以公尺為標準)</th>
            <th>寬(以公尺為標準)</th>
            <th>操作1</th>
            <th>操作2</th>
            <th>操作3</th>
        </tr>
        @foreach($antiques as $antique)
            @if ($antique->long > 50)
                <tr style="color: darkblue">
                    <td>{{$antique->id}}</td>
                    <td>{{$antique->p_name}}</td>
                    <td>{{$antique->dynasty->t_name}}</td>
                    <td>{{$antique->location}}</td>
                    <td>{{$antique->long}}</td>
                    <td>{{$antique->width}}</td>
                    <td><a href="{{ route('antiques.show', ['id'=>$antique->id])}}">顯示</a></td>
                    <td><a href="{{route('antiques.edit', ['id'=>$antique->id])}}">修改</a></td>
                    <td>
                        <form action="{{url('/antiques/delete', ['id' => $antique->id]) }}" method="post">
                            <input class="btn btn-default" type="submit" value="刪除" />
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </tr>
            @else
                <tr style="color: firebrick">
                    <td>{{$antique->id}}</td>
                    <td>{{$antique->p_name}}</td>
                    <td>{{$antique->dynasty->t_name}}</td>
                    <td>{{$antique->location}}</td>
                    <td>{{$antique->long}}</td>
                    <td>{{$antique->width}}</td>
                    <td><a href="{{route('antiques.show', ['id'=>$antique->id])}}">顯示</a></td>
                    <td><a href="{{ route('antiques.edit', ['id'=>$antique->id])}}">修改</a></td>
                    <td>
                        <form action="{{url('/antiques/delete', ['id' => $antique->id]) }}" method="post">
                            <input class="btn btn-default" type="submit" value="刪除" />
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </table>
@endsection
