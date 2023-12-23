document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".checkboxPagado").forEach((elem) =>
    elem.addEventListener("click", () => {
      elem.closest("form").submit();
    })
  );
});
