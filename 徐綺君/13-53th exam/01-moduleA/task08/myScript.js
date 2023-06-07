const a = document.querySelectorAll('a');

a.forEach(link => {
    link.addEventListener('click',(e)=>{
        e.preventDefault();
        let body = document.querySelector('h1')

        fetch(link.href)
        .then((response) => response.text())
        .then((text) => {
            console.log(1);
            text = text.match(/<h1[^>]*>([\s\S]*)<\/h1>/)
            text = text[0].replace(/<script>([\s\S]*)<\/script>/,'')
            text = text.replace('<h1>','')
            text = text.replace('</h1>','')
            body.innerHTML = text;
        });
        history.pushState(null,null,link.href)
    })
    
});