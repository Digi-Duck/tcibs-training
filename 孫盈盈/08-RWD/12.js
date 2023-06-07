let body = document.querySelector('body');

body.innerHTML += `<div class="back">
                    <button class="left"><</button>
                        <input id="img" type="image">
                        <button class="right">></button>
                    </div>
                    `
                    
let show = document.getElementById('img');
let dialog = document.querySelector('.back');
let left = document.querySelector('.left')
let right = document.querySelector('.right');
let active = 0;

let images = document.querySelectorAll('img');

dialog.style.display = 'none';
dialog.style.alignItems = 'center';
dialog.style.justifyContent = 'space-around';
dialog.style.width = '100%';
dialog.style.height = '100%';
dialog.style.position = 'fixed';
dialog.style.top = 0;
dialog.style.backgroundColor = 'rgba(110, 110, 110, 0.342)';

images.forEach((img, index)=>{
    img.id = 'img' + index;
    // dialogs[index].style.display = 'none';

    img.addEventListener('click', ()=>{
        console.log(show);
        show.src = img.src;
        dialog.style.display = 'flex';

        active = index;
    })
})

dialog.addEventListener('click', (e)=>{
    e.preventDefault();
    dialog.style.display = 'none';
})

left.addEventListener('click', (e)=>{
    e.stopPropagation();
    if(active <= 0){
        active = 0;
    }else{
        active --;
    }
    show.src = images[active].src
})

right.addEventListener('click', (e)=>{
    e.stopPropagation();
    console.log(images.length);
    if(active >= images.length - 1){
        active = images.length - 1;
    }else{
        active ++;
    }
    show.src = images[active].src
})