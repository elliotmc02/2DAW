document.addEventListener('DOMContentLoaded', () => {
    document.getElementsByName('aficiones').forEach(elem => {
        elem.addEventListener('change', () => {
            const values = [...(document.querySelectorAll('input[name="aficiones"]:checked'))].map(v => v.value);
            document.querySelector('textarea').value = values.join(", ");
        });
    });
});