@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
<style>
    h2{
        margin: 0px;
        margin-bottom: 20px;
    }
    textarea{
        margin-bottom: 15px;
    }

</style>
@endsection

@section('main')
    <form action="{{asset('/store-news')}}" method="POST" class="box">
        @csrf
        <h2>新增最新消息</h2>
        <label for="title">標題</label>
        <input type="text" class="title" name="title" id="title" required>
        <label for="date">日期</label>
        <input type="date" class="date" name="date" id="date" required>
        <label for="image_url">圖片</label>
        <input type="text" class="image_url" name="image_url" id="image_url" required>
        <label for="content">內文</label>
        <textarea type="text" class="content" name="content" id="content" cols="30" rows="10" required></textarea>
        <button>送出</button>
    </form>
@endsection

@section('js')

@endsection
