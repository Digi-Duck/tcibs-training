@extends('tem')
@section('css')
<style>
    
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
            <form action="/updateup" method="GET">
                <input type="text" name="id" id="" value="{{$data->id}}" hidden>
                <input type="text" name="title" value="{{$data->title}}">
                <input type="text" name="content" value="{{$data->content}}">
                <input type="text" name="img" value="{{$data->img}}">
                <button>送出</button>

            </form>
            
        </div>
    </main>
@endsection