document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input[type="button"').addEventListener('click', cambio);
});

function cambio() {
    let n = parseFloat(document.querySelector('input[name="n"]').value);
    switch (`${document.querySelector('select[name="c1"]').value},${document.querySelector('select[name="c2"]').value}`) {
        case 'eur,dol': n *= 1.09; break;
        case 'dol,eur': n *= 0.83; break;
    }
    document.querySelector('input[name="res"]').value = n.toFixed(2);
}