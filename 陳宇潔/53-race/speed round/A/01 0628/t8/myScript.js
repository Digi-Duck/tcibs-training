const a = document.querySelectorAll('a')
const content = document.querySelector('main')

a.forEach(a => {
    a.addEventListener('click', function(e){
        e.preventDefault()
        fetch(a.href)
        .then(response => response.text())
        .then(data => {
            const parser = new DOMParser()
            const doc = parser.parseFromString(data, 'text/html')
            content.innerHTML = doc.querySelector('main').innerHTML
        })
        history.pushState(null, null, a.href)
    })
})