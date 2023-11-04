document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("a").addEventListener("mouseover", () => {
        const div = document.createElement("div");
        div.className = "div-enlace";
        div.textContent = `La URL de este enlace es: ${document.querySelector("a").getAttribute("href")}`;
        document.body.appendChild(div);
    });
    document.querySelector("a").addEventListener("mouseleave", () => {
        document.body.removeChild(document.querySelector("div"));
    });
});