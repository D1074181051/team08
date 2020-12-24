@extends('app')

@section('title', '所有朝代')

@section('theme', '所有朝代資料')

@section('contents')
 <a style="color: salmon" href="{{route('dynastys.create')}}">新增朝代</a>
    <table>
        <tr>
            <th>編號</th>
            <th>朝代</th>
            <th>經歷時間(起)(西元)</th>
            <th>經歷時間(迄)(西元)</th>
            <th>舊時首都</th>
            <th>操作1</th>
            <th>操作2</th>
        </tr>
        @foreach($dynastys as $dynasty)
            @if($dynasty->s_time < 0)
                <!--{{$BC = "B.C."}}-->
                <!--{{$dynasty->s_time *= -1}}-->
            @else
                {{$BC = ""}}
            @endif
            @if($dynasty->e_time < 0)
                <!--{{$BC2 = "B.C."}}-->
                <!--{{$dynasty->e_time *= -1}}-->
                @else
                    {{$BC2 = ""}}
                @endif
            @if ($dynasty->e_time > 1500)
            <tr style="color: darkviolet">
                <td>{{$dynasty->id}}</td>
                <td>{{$dynasty->t_name}}</td>
                <td>{{$BC.$dynasty->s_time}}</td>
                <td>{{$BC2.$dynasty->e_time}}</td>
                <td>{{$dynasty->capital}}</td>
                <td><a href="{{route('dynastys.show', ['id' => $dynasty->id])}}">顯示</a></td>
                <td><a href="{{ route('dynastys.edit', ['id'=>$dynasty->id])}}">修改</a></td>
                <td>
                    <form action="{{url('/dynastys/delete', ['id' => $dynasty->id]) }}" method="post">
                        <input class="btn btn-default" type="submit" value="刪除" />
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
            @else
                <tr style="color: forestgreen">
                    <td>{{$dynasty->id}}</td>
                    <td>{{$dynasty->t_name}}</td>
                    <td>{{$BC.$dynasty->s_time}}</td>
                    <td>{{$BC2.$dynasty->e_time}}</td>
                    <td>{{$dynasty->capital}}</td>
                    <td><a href="{{route('dynastys.show', ['id'=>$dynasty->id])}}">顯示</a></td>
                    <td><a href="{{route('dynastys.edit', ['id'=>$dynasty->id])}}">修改</a></td>
                    <td>
                        <form action="{{url('/dynastys/delete', ['id' => $dynasty->id]) }}" method="post">
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
