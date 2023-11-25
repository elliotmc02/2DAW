document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("input[type=button]").addEventListener("click", () => {
        document.querySelector("ul").appendChild(document.createElement("li")).textContent = prompt("cadena: ");
    });
});