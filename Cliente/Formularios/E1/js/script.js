document.addEventListener("DOMContentLoaded", () => {
    document
        .querySelector('input[type="button"')
        .addEventListener("click", () => {
            document.querySelectorAll("input")[1].value =
                document.querySelectorAll("input")[0].value;
        });
});
