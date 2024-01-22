$(document).ready(() => {
  // fecha
  $('#fecha').datepicker();

  // modo oscuro
  $('#oscuro').click(() => {
    if ($(':root').css('--color-principal') == '#FFFFFF') {
      $(':root').css('--color-principal', '#333333');
      $(':root').css('--color-secondary', '#cacaca');
      $(':root').css('--color-title', '#FFFFFF');
      $(':root').css('--color-subtitle', '#FFFFFF');
      $(':root').css('--color-text', '#FFFFFF');
    } else {
      $(':root').css('--color-principal', '#FFFFFF');
      $(':root').css('--color-secondary', 'burlywood');
      $(':root').css('--color-title', '#222222');
      $(':root').css('--color-subtitle', '#888');
      $(':root').css('--color-text', '#555');
    }
  });
});