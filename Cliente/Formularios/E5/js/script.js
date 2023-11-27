document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('input[type="button"]').addEventListener('click', () => {
        alert(comprobarAnagrama() ? 'es anagrama' : 'no es anagrama');
    });
});

function comprobarAnagrama() {
    let p1 = document.querySelectorAll('input[type="text"]')[0].value;
    let p2 = document.querySelectorAll('input[type="text"]')[1].value;

    return [...p1].sort().join("") == [...p2].sort().join("");
}