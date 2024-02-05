// document.addEventListener('DOMContentLoaded', async () => {
//     const books = await fetch('https://www.jaimeweb.es/medac/books.json')
//         .then(response => response.json())
//         .then(data => data.library.map(book => book.book))
//         .catch(error => error);
//     document.body.innerHTML = books.map(book =>
//         `<h2>${book.title}</h2>
//         <img src="${book.cover}">`
//     ).join('');
// });

document.addEventListener('DOMContentLoaded', () => {
    fetch('https://www.jaimeweb.es/medac/books.json')
        .then(response => response.json())
        .then(data => data.library.forEach(book => {
            document.body.innerHTML +=
                `<h2>${book.book.title}</h2>
            <img src="${book.book.cover}">`
        }))
        .catch(error => console.log(error));
});