let getTime = document.querySelector('.getTime')
getTime.addEventListener('change', ()=>{
    console.log(getTime.value);
    a = new Date()
    console.log(a.getHours());
    
})
