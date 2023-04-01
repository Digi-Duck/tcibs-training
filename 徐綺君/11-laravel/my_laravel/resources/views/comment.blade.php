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
            .big_box{
                padding: 20px 50px;
                width: 80%;
                background-color: #dbdbdb;
                border-radius: 10px;
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
                min-height: 100px;
                border-bottom: 2px solid black;
                padding: 20px;
                margin: auto;
            }
            .comment_top{
                width: 100%;
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
                margin-bottom: 10px;
            }
            .comment_l{
                display: flex;
                align-items: flex-end;
            }
            .comment_title{
                font-size: 50px;
                margin-right: 15px;
            }
            .comment_text{
                margin-left: 10px;
                word-break: break-all;
            }
        </style>
    @endsection

    @section('main')
    <div class="m">
        <div class="big_box">
            <div class="title">
                留言區
            </div>
            <form class="form" action="./say" method="post">
                <div class="box">
                    <div class="text">姓名</div>
                    <input type="text" class="input">
                </div>
                <div class="box">
                    <div class="text">標題</div>
                    <input type="text" class="input">
                </div>
                <div class="box">
                    <div class="text">內容</div>
                    <input type="text" class="input">
                </div>
                <button>送出</button>
            </form>
            <div class="comment_box">
                <div class="comment">
                    <div class="comment_top">
                        <div class="comment_l">
                            <div class="comment_title">qweerwret</div>
                            <div class="name">作者:12345</div>
                        </div>
                        <div class="comment_time">時間:123456</div>
                    </div>
                    <div class="comment_text">sdflkj;;;fkdjjjjjjjjjjjierhrguhfdkjhfuirhbjkbdjkhfuihnvjkhkdfhurehkegbkshguifkahjfkdhakasdugfuerygbhjfdsabdhfgjseayfgjksagkj</div>
                </div>
            </div>
        </div>
    </div>
    @endsection
