let insert = document.querySelector('#insert');
let thing = document.querySelector('.event');
let date = document.querySelector('.date');
let explain = document.querySelector('.explain')

let complete = document.querySelector('.complete')
let uncomplete = document.querySelector('.uncomplete')
let data = []

let i = 0
insert.addEventListener('click', ()=>{
    data.push({
        "id": i + 1,
        "event": thing.value,
        "explain": explain.value,
        "date": date.value, 
        "complete": 0
    })
    i = i + 1
    thing.value = ""
    explain.value = ""
    date.value = ""

    uncomplete.innerHTML += `<div class="event">
                                <p>${data[data.length - 1].event}</p>
                                <p>${data[data.length - 1].explain}</p>
                                <p>${data[data.length - 1].date}</p>
                                <button class="delete" onclick="dec(${data[data.length - 1].id})" name="${data[data.length - 1].id}">刪除</button>
                                <button class="update" onclick="update(${data[data.length - 1].id})" name="${data[data.length - 1].id}">完成</button>
                            </div>`
    })

function update(name){
    uncomplete.innerHTML = ``
    complete.innerHTML = ``
    data.forEach((b, index)=>{
        if(b.id == name){
            b.complete = 1
        }
        if (b.complete == 1){
            complete.innerHTML += `<div class="event">
                                <p>${data[index].event}</p>
                                <p>${data[index].explain}</p>
                                <p>${data[index].date}</p>
                                <button class="delete" onclick="dec(${data[index].id})" name="${data[index].id}">刪除</button>
                            </div>`
        }else{
            uncomplete.innerHTML += `<div class="event">
                                <p>${data[index].event}</p>
                                <p>${data[index].explain}</p>
                                <p>${data[index].date}</p>
                                <button class="delete" onclick="dec(${data[index].id})" name="${data[index].id}">刪除</button>
                                <button class="update" onclick="update(${data[index].id})" name="${data[index].id}">完成</button>
                            </div>`
        }

    })
}

function dec(name){
    let d = document.querySelectorAll('.delete')
    d.forEach((b, index)=>{
        if(b.name == name){
            let result = data.filter(datas => datas.id !== name)
            data = result
        }
    })
    complete.innerHTML = ``
    uncomplete.innerHTML = ``
    data.forEach((b, index)=>{
        if (b.complete == 1){
            complete.innerHTML += `<div class="event">
                                <p>${data[index].event}</p>
                                <p>${data[index].explain}</p>
                                <p>${data[index].date}</p>
                                <button class="delete" onclick="dec(${data[index].id})" name="${data[index].id}">刪除</button>
                            </div>`
        }else{
            uncomplete.innerHTML += `<div class="event">
                                <p>${data[index].event}</p>
                                <p>${data[index].explain}</p>
                                <p>${data[index].date}</p>
                                <button class="delete" onclick="dec(${data[index].id})" name="${data[index].id}">刪除</button>
                                <button class="update" onclick="update(${data[index].id})" name="${data[index].id}">完成</button>
                            </div>`
        }
    })
}

                        
