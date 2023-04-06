@extends('tem')
@section('css')
<style>
    *{
        font-size: 100px;
    }
    body{
        width: 100%;
        height: 100%;
        margin: 0px;
    }
    html{
        width: 100%;
        height: 100%;
    }
    .mainBox{
        width: 80%;
        margin: auto;
    }
    .box{
        width: 100%;
        height: 100px;
        display: flex;
    }
    .content{
        width: 50%;
        height: 100%;
    }
    button{
        font-size: 30px
    }
</style>
@endsection
@section('main')
    <main>
        <div class="mainBox">
            <form action="/insert" method="GET">
                <input type="text" name="title">
                <input type="text" name="content">
                <input type="text" name="img">
                <button>送出</button>

            </form>
            @foreach($data as $index)
            <div class="box">
                <div class="content">{{$index->title}}</div>
                <div class="content">{{$index->content}}</div>
                <div class="content">{{$index->img}}</div>
                <a href="/update/{{$index->id}}">
                    <button>更改</button>
                </a>
                <a href="/delete/{{$index->id}}">
                    <button>刪除</button>

                </a>
            </div>
            @endforeach
        </div>
    </main>
@endsection