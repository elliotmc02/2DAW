document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input').addEventListener('click', async () => {
        // paso 1
        const datos = await fetch('https://www.jaimeweb.es/medac/datos.json')
            .then(response => response.json())
            .then(data => data.map(resultados => resultados))
            .catch(error => console.log('error:', error))

        // paso 2
        console.log(...datos);

        // paso 3
        datos.forEach(obj => {
            for (const valor in obj) {
                console.log(obj[valor]);
            }
        })
    });
});