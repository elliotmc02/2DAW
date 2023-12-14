document.addEventListener("DOMContentLoaded", () => {
  document.getElementsByName("aficiones").forEach((elem) => {
    elem.addEventListener("change", () => {
      document.querySelector("textarea").value = [
        ...document.querySelectorAll('input[name="aficiones"]:checked'),
      ].map((v) => v.value);
    });
  });
});
