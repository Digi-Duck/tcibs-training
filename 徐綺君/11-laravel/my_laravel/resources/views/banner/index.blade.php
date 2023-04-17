@extends('template')

    @section('pageTitle')
        Banner管理
    @endsection

    @section('css')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
                Banner管理
            </div>

            <table id="myTable">
                <thead>
                    <tr>
                        <th>圖片預覽</th>
                        <th>圖片權重</th>
                        <th>功能</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $item)
                        <tr>
                            <td>
                                <img src="{{$item->img_path}}" alt="">
                            </td>
                            <td>{{$item->weight}}</td>
                            <td>
                                <button class="btn btn-success">編輯</button>
                                <button class="btn btn-danger">刪除</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection

    @section('js')
        <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"  integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw="  crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script>
            let table = new DataTable('#myTable');
        </script>
    @endsection
