const table = document.querySelector('table')
const scoreBox = document.querySelector('.scoreBox')
fetch("./csv/ans1.csv")
    .then(response => response.text())
    .then(response => {
        actual = response.split(',')
        return fetch("./csv/ans2.csv")
    })
    .then(response => response.text())
    .then(response => {
        submitted = response.split(',')
        let score = 0
        for(let i = 1; i<= 10; i++){
            table.innerHTML += 
            `<tr>
                <td>${i}</td>
                <td>${actual[i - 1]}</td>
                <td>${submitted[i - 1]}</td>
            </tr>`
            score += 1 ? actual[i - 1] === submitted[i - 1] : ''
        }
        scoreBox.innerHTML = `Score: ${score}/${actual.length}`
    })
