document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('input')[0].addEventListener('keyup', () => {
        document.querySelectorAll('input')[1].value = document.querySelectorAll('input')[0].value;
    });
});