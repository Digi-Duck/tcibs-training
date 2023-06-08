const table = document.querySelector('table')
const scoreBox = document.querySelector('.scoreBox')
let actual = ['A', 'B', 'B', 'C', 'D', 'A', 'B', 'C', 'D', 'C']
let submitted = ['A', 'A', 'C', 'C', 'D', 'C', 'B', 'A', 'D', 'C']
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