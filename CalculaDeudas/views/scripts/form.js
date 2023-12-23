document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.checkboxPagado').forEach(elem =>
    elem.addEventListener('click', () => {
      elem.closest('form').submit();
    })
  );
    document.getElementsByName('campo').forEach(elem => {
      elem.addEventListener('change', (ev) => {
        const orden = document.querySelector('select[name="orden"]');
        switch(ev.target.value) {
          case 'receptor':
            orden.children[0].textContent = 'A-Z';
            orden.children[1].textContent = 'Z-A';
            break;
          case 'cantidad':
            orden.children[1].textContent = 'Mayor a menor';
            orden.children[0].textContent = 'Menor a mayor';
            break;
          case 'fecha':
            orden.children[1].textContent = 'Más reciente';
            orden.children[0].textContent = 'Más antiguo';
            break;
          case 'pagado':
            orden.children[1].textContent = 'Si';
            orden.children[0].textContent = 'No';
            break;
        }
      })
    })
});
