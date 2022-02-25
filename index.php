<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi proyecto web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="container">
  <h1>Hola, este es mi sitio web, utilizando HTML + Bootstrap y PHP</h1>


  <form class="form-horizontal" method="POST">
    <fieldset>

    <!-- Form Name -->
    <legend>Form Name</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="nombre">Nombre</label>  
      <div class="col-md-4">
      <input id="nombre" name="nombre" type="text" placeholder="" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="apellido">Apellido</label>  
      <div class="col-md-4">
      <input id="apellido" name="apellido" type="text" placeholder="" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="edad">Edad</label>  
      <div class="col-md-4">
      <input id="edad" name="edad" type="text" placeholder="" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="enviar"></label>
      <div class="col-md-4">
        <button id="enviar" name="enviar" class="btn btn-primary">Enviar</button>
      </div>
    </div>

    </fieldset>
  </form>


<?php
  require_once './conection.php';
?>

<!-- Método para guardar respuestas del formulario en mi BD -->
<?php
    if(isset($_POST['enviar'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $edad = $_POST['edad'];

        $sql = "INSERT INTO usuarios (nombre, apellido, edad) VALUES ('$nombre', '$apellido', '$edad')";
        $result = mysqli_query($enlace, $sql);
    }
?>
<!-- Método para guardar respuestas del formulario en mi BD -->

<!-- Método para pintar respuestas del formulario en el front -->
<?php

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s <br>", mysqli_connect_error());
    exit();
}

$consulta = "SELECT nombre, apellido, edad FROM usuarios";

if ($resultado = $enlace->query($consulta)) {

    /* obtener el array de objetos */
    while ($fila = $resultado->fetch_row()) {
        printf ("Nombre: %s Apellido: %s Edad: %s <br><br>", $fila[0], $fila[1], $fila[2]);
    }

    /* liberar el conjunto de resultados */
    $resultado->close();
}
/* cerrar la conexión */
$enlace->close();
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>