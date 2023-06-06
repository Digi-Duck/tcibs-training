<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <script>
        obj = {
            'car': '60w',
            'watch' : '30w',
            'house' : '1200w',
        }

        student = ['Arry','Jason','Don','Jenny','Kaz']


        obj2 = JSON.stringify(obj);

        array = JSON.stringify(student);

        console.log( obj);
        console.log( obj2);
        console.log( array);

        console.log(student[0]);

        console.log( typeof obj);
        console.log( typeof obj2);
        console.log( typeof array);




    </script>


    <?php  
    
       $data = '{"car":"60w","watch":"30w","house":"1200w"}';

        echo $data;
        $a = json_decode($data);

        echo $data->car;

        echo $a->car;
    
    ?>
</body>
</html>