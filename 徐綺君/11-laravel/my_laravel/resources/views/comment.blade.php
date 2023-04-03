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
            }
        </style>
    @endsection

    @section('main')
    <div class="m">
        <div class="big_box">
            <div class="title">
                留言區
            </div>
            <form class="form" action="/comment/save" method="get">
                <div class="box">
                    <div class="text">姓名</div>
                    <input type="text" class="input" name="name">
                </div>
                <div class="box">
                    <div class="text">標題</div>
                    <input type="text" class="input"  name="title">
                </div>
                <div class="box">
                    <div class="text">內容</div>
                    <input type="text" class="input" name="content">
                </div>
                <div class="box">
                    <div class="text">Email</div>
                    <input type="text" class="input" name="email">
                </div>
                <button>送出</button>
            </form>
            @foreach ($comments as $comment)
                <div class="comment_box">
                    <div class="comment">
                        <div class="comment_top">
                            <div class="comment_l">
                                <div class="comment_title">{{$comment->title}}</div>
                                <div class="name">作者:{{$comment->name}}</div>
                            </div>
                            <div class="comment_time">時間:{{$comment->created_at}}</div>
                        </div>
                        <div class="comment_text">{{$comment->content}}</div>
                        <a class="comment_link" href="/comment/dalete/{{$comment->id}}">刪除</a>
                        <a class="comment_link" href="/comment/update/{{$comment->id}}">編輯</a>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
    @endsection
