@extends('layouts.template')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('main')
    @foreach ($news as $item)
    {{-- @php
        dump($item);
    @endphp --}}
        <div class="new-card">
            <img src="{{$item->image_url}}" alt="">
            <div class="content">
                <span class="tag"></span>
                <a href="http://127.0.0.1:8000/news/{{$item->id}}">{{$item->title}}</a>
                <span class="date">{{$item->date}}</span>
                <p>{{$item->content}}</p>
            </div>
        </div>
    @endforeach
@endsection

@section('js')

@endsection
