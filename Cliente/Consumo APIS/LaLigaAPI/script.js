document.addEventListener('DOMContentLoaded', () => {
    clasificacionAPI();
});

const clasificacionAPI = () => {
    const apiURL = 'https://www.jaimeweb.es/medac/victorg/clasificacion.json';

    fetch(apiURL)
        .then(response => response.json())
        .then(data => data.table.forEach(mostrarTabla))
        .catch(error => console.log(error));
}

const mostrarTabla = equipo => {
    const tr = document.createElement('tr');
    const props = ['pos', 'shield', 'team', 'points', 'round', 'wins', 'losses', 'draws'];

    // tr.append(...props.map(prop => {
    //     const elem = prop === 'shield' ? document.createElement('img') : document.createElement('td');
    //     if (prop === 'shield') {
    //         elem.setAttribute('src', equipo[prop]);
    //     } else {
    //         elem.textContent = equipo[prop];
    //     }
    //     return elem;
    // }));

    props.forEach(prop => {
        const elem = prop === 'shield' ? document.createElement('img') : document.createElement('td');
        if (prop === 'shield') {
            elem.setAttribute('src', equipo[prop]);
        } else {
            elem.textContent = equipo[prop];
        }
        tr.appendChild(elem);
    });

    document.querySelector('tbody').appendChild(tr);
}