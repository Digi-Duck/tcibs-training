@extends('template')

    @section('pageTitle')
        留言區
    @endsection

    @section('css')
        <style>
            .m{
                display: flex;
                justify-content: center;
                padding-top: 50px;
            }
            .big_box{
                padding: 20px 50px;
                width: 70%;
                background-color: #f2f2f2;
                border-radius: 10px;
                border: 5px solid #f2f2f2;
            }
            .title{
                font-size: 30px;
                color: #5f5f5f;
            }
            .box{
                width: 100%;
                display: flex;
                align-items: center;
                margin: 20px 0;
            }
            .text{
                font-weight: 600;
                font-size: 22px;
                padding: 5px;
                color: #5f5f5f;
            }
            .input{
                width: 80%;
                font-size: 20px;
                padding: 5px;
                background-color: #ffffff;
                display: block;
                border: 3px solid rgb(138, 138, 138);
                border-radius: 5px
            }
            #img{
                background-color: inherit;
                border: inherit;
                border-radius: inherit;
            }
            .comment_box{
                width: 95%;
                border-bottom: 2px solid rgb(138, 138, 138);
                padding: 10px;
                margin: 10px auto;
            }
            .comment_top{
                width: 100%;
                height: 40px;
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
                margin-bottom: 10px;
            }
            .name{
                padding-bottom: 5px;
            }
            .comment_l{
                display: flex;
                align-items: flex-end;
            }
            .comment_title{
                font-size: 35px;
                margin-right: 5px;
            }
            .comment_text{
                margin-left: 2px;
                word-break: break-all;
                margin-bottom: 15px;
            }
            .comment_link{
                background-color: #ffffff;
                padding: 5px;
                margin: 5px;
                border-radius: 5px;
                color: black;
            }
            .comment_link:hover{
                background-color: #eeeeee;
                box-shadow: 0 3px 5px 0 rgba(129, 129, 129, 0.329);
            }
            .comment_link:active{
                color: black;
            }
            .comment_link:visited{
                color: black;
                opacity: ;
            }
        </style>
    @endsection

    @section('main')
    <div class="m">
        <div class="big_box">
            <div class="title">
                Banner新增
            </div>
            <form class="form" action="/banner/store" method="post" enctype="multipart/form-data">
                @csrf
                <label class="text" for="banner_img">banner圖片上傳</label>
                <input type="file" class="input" name="banner_img" id="banner_img">
                <label class="text" for="opacity">透明度</label>
                <input type="text" class="input"  name="opacity" id="opacity">
                <label class="text" for="weight">權重</label>
                <input type="number" class="input" name="weight" id="weight">
                <button>送出</button>
            </form>

        </div>
    </div>
    @endsection
