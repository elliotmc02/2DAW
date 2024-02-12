document.querySelector("button").addEventListener("click", (e) => {
  let salida = document.getElementById("salida");

  //Cambia la ruta para forzar un error 404
  const url = "addAlumno.php";

  //Creo A MANO los datos para insertar
  let fd = new FormData();
  fd.append("nombre", "SrHormiga");
  fd.append("dni", "11111133G");
  fd.append("apel", "Loka");
  fd.append("edad", 43);
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
