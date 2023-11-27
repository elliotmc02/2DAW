document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input[type="button"]').addEventListener('click', () => {
        document.body.appendChild(document.createElement('div')).textContent = document.querySelector('textarea').value.substring(0, 50);
    });
});