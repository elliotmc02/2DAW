document.querySelector("button").addEventListener("click", (e) => {
  let salida = document.getElementById("salida");

  //Cambia la ruta para forzar un error 404
  const url = "muestraFdatos.php";

  //Obtengo los datos del formulario
  let formu = document.querySelector("form");
  let fd = new FormData(formu);
  //O usar fd.append(name,value)
  console.log("Datos del formulario: ");
  console.log(fd);

  //Opciones para el envío
  const opciones = {
    method: "POST",
    body: fd,
  };

  fetch(url, opciones)
    .then((respuesta) => {
      console.log(respuesta);
      //Verificamos si la ruta era correcta
      if (!respuesta.ok) {
        throw new Error("Error consumiendo API: " + respuesta.status);
      }
      //Transformamos los datos a:
      //texto respuesta.text();
      //json: respuesta.json()
      return respuesta.json(); //devuelve una promesa
    })
    .then((datos) => {
      console.log(datos);
    })
    .catch(function (error) {
      console.log("Problema con el fetch: " + error);
    });
});
