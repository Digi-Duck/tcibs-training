<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .codeDrag{
            width: calc(30px * 4);
            height: 30px;
            border:1px solid black;
        }
    </style>
</head>
<body>
    <h1>登入~ ~ ~</h1>
    <form action="./login.php" method="POST">
        <label>
            帳號
            <input type="text" name="account" required>
        </label>
        <label>
            密碼
            <input type="text" name="password" required>
        </label>
        <label for="">
            驗證碼
            <p class="answer"></p>
            <div class="code"></div>
            <div class="codeDrag"></div>
            <button type="button">重新產生</button>
            <input type="text" name="code" class="check" hidden>
        </label>
        <button>登入</button>
    </form>
    <script>
        let answerDiv = document.querySelector('.answer')
        let btn = document.querySelector(".btn")
        let check = document.querySelector('.check')
        let codeDiv = document.querySelector('.code')
        let codeDrag = document.querySelector('.codeDrag')
        let images = [];
        let answer = "";
        let ondrag = "";

        fetch('./getAnswer.php')
        .then(response => response.text())
        .then((response) =>{
            answer = response;
            answerDiv.innerHTML = answer;
            let array = [0, 1, 2, 3];
            array.sort(() => Math.random() - 0.5);
            array.forEach(element =>{
                images.push({
                    src : `./code2.php?num=${element}`,
                    value : answer[element],
                })
                console.log(images);
            })
            codeDiv.innerHTML = "";
            images.forEach(element =>{
            codeDiv.innerHTML += `<img dragable="true" id="${element.value}" src=${element.src}>`;
            })
            images = document.querySelectorAll('img');
            images.forEach(element => {
                element.addEventListener('dragstart' , (ev) => {
                    ondrag = element.id;
                    // console.log(ondrag)
                })
            })
        })

        codeDrag.addEventListener('dragover' , (ev) => {
            ev.preventDefault();
        })

        codeDrag.addEventListener('drop', (ev) => {
            let checkAnswer = '';
            codeDrag.append(document.getElementById(ondrag));
            let checkImgs = codeDrag.getElementsByTagName("img");
            for(let i = 0; i < checkImgs.length; i++){
                checkAnswer += checkImgs[i].id;
            }
            check.value = checkAnswer;
        })
        console.log(codeDrag);
       

        // btn.onclick = function(){
        //     img.src = "./code.php";
        // }
    </script>
</body>
</html>