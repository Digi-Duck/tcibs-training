@extends('template')

    @section('pageTitle')
        Hello world!
    @endsection

    @section('css')
        <style>
            .m{
                display: flex;
                justify-content: center;

                padding-top: 50px;
            }
            .Hello{
                font-size : 50px;
                margin: 50px;
            }
        </style>
    @endsection

    @section('main')
    <div class="m">
        <div class="Hello">Hello world!</div>
    </div>
    @endsection
