document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input[type="button"]').addEventListener('click', () => {
        document.body.appendChild(document.createElement('div')).textContent = document.querySelector('textarea').value.slice(0, 50);
    });
});