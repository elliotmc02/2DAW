document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input').addEventListener('click', async function () {
        // paso 1
        // si te pide de meterlo en una variable, usa async y await
        const datos = await fetch('https://www.jaimeweb.es/medac/datos.json')
            .then(response => response.json())
            .catch(error => console.log('error:', error))

        // paso 2
        // console.log(...datos);
        datos.forEach(obj => {
            console.log(obj);
        })

        // paso 3
        datos.forEach(obj => Object.values(obj).forEach(valor => console.log(valor)))

        // datos.forEach(obj => {
        //     for (const valor in obj) {
        //         console.log(obj[valor]);
        //     }
        // })
    });
});