const refresh = document.querySelector('.refresh');
const clear = document.querySelector('.clear');
const img = document.querySelectorAll('img');

refresh.addEventListener('click',function(){
    img.forEach(function(element,index){
        element.src = `verify${img[index]}.php`;
    });
})
clear.addEventListener('click', function(){
    
})