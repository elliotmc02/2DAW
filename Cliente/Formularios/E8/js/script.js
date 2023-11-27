document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[name="color"]').forEach(elem => elem.addEventListener('change', () => document.querySelector('div').style.setProperty('background-color', elem.value)));
});