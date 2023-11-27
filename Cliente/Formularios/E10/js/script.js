document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('select[name="marcas"]').addEventListener('change', mostrar);
    document.querySelector('input').addEventListener('click', () => {
        alert(document.querySelector('select[name="productos"').value != "" ? 'hay valor seleccionado' : 'no hay valor seleccionado')
    });
});

function mostrar(event) {
    const productos = document.querySelector('select[name="productos"]');
    productos.innerHTML = '';
    const opciones = {
        intel: ['', 'HD 3000', 'HD 4000', 'IRIS 600'],
        amd: ['', 'RX Series 500', 'Vega Series', 'RX Series 6000'],
        nvidia: ['', 'GTX Serie 1000', 'GTX Serie 2000', 'GTX Serie 3000']
    };
    if (opciones[event.target.value]) opciones[event.target.value].forEach(p => productos.add(new Option(p, p)));
}