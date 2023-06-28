const links = document.querySelectorAll('a')
const div = document.querySelector('h1')

links.forEach(link => {
  link.addEventListener('click', function (e) {
    e.preventDefault()
    fetch(link.href)
      .then(response => response.text())
      .then(data => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(data, 'text/html');
        div.innerHTML = doc.querySelector('h1').innerHTML
      })
      .catch(error => {
        console.error('Error:', error);
      })
      history.pushState(null,null,link.href)
  })
})
