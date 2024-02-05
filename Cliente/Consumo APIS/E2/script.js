document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input').addEventListener('click', async () => {
        document.querySelector('#salida').innerHTML =
            await fetch('https://jsonplaceholder.typicode.com/comments')
                .then(response => response.json())
                .then(data => data.map(c => c.body).join('<br>'))
                .catch(error => console.log(error));
    });
});