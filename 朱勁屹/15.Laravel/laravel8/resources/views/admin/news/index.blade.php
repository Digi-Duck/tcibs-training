<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <style>
        .btn{
            width: 100px;
            background-color: rgb(0, 217, 255);
            color: black;
            padding: 5px;
            text-decoration: none;
        }
        tr{
            text-align: center;
        }
    </style>
</head>
<body>

    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>標題</th>
                <th>日期</th>
                <th>內容</th>
                <th>圖片</th>
                <th>操作</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $item)
            <tr>
            <td>{{$item->title}}</td>
            <td>{{$item->date}}</td>
            <td>{{$item->content}}</td>
            
            <td><img src="{{$item->image}}" alt="" width="200" height="200"></td>
            <td>
                <a href="" class="btn btn-primary">編輯</a>
                <a href="" class="btn btn-danger">刪除</a>
            </td>
            </tr>
            @endforeach
            
            {{-- <tr>
                <td>Row 2 Data 1</td>
                <td>Row 2 Data 2</td>
            </tr> --}}
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>