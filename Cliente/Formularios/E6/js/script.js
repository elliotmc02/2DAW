document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('input[type="checkbox"]').forEach((elem) => {
        elem.addEventListener('change', () => modificarLista(elem));
    });
});

function modificarLista(elem) {
    const lista = document.querySelector('select');
    elem.checked ? lista.add(new Option(elem.value, elem.value)) : lista.remove([...lista].findIndex(option => option.value == elem.value));
}