@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('main')
    <div class="container">
        <h2>{{$news->title}}</h2>
        <div>發布日期:<span>{{$news->date}}</span>瀏覽次數:<span>1234</span></div>
        <hr>
        <p>
            {{$news->content}}
        </p>
        <img src="{{$news->image_url}}" alt="">
    </div>
@endsection

@section('js')

@endsection
