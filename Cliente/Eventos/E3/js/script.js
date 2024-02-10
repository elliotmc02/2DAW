document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('keypress', (ev) => {
        document.querySelector('div').textContent = ev.key;
    });
});