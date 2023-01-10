@extends('layouts.template')

@section('title','首頁')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('main')
    <form action="{{asset('/contact')}}" method="POST" class="box">
        @csrf
        <label for="name">name</label>
        <input type="text" class="name" name="name" id="name">
        <label for="phone">phone</label>
        <input type="text" class="phone" name="phone" id="phone">
        <label for="email">email</label>
        <input type="text" class="email" name="email" id="email">
        <label for="content">message</label>
        <input type="text" class="content" name="content" id="content">
        <button>送出</button>
    </form>
@endsection

@section('js')

@endsection

