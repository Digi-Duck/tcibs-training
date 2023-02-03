const checkboxes = document.querySelectorAll('.row input[type="checkbox"]');
const line = document.querySelectorAll('.row')

function shift(e){
    alert("true" + e.shiftKey);

    checkboxes.forEach(function(element,index){
        element.addEventListener('click',function(){
            checkboxes[index].classList.toggle(`img${index}`)
            line[index].classList.toggle('line')
        })
    })
}

