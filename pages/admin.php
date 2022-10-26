<?php
  session_start();
  if(empty($_SESSION['login'])){
    echo "<script>location.href='../pages/login.php'</script>";
    die();
  }
  
  require_once '../components/cabecera.html';
  
  require_once '../models/alumno.php';

  $listaAlumno=alumno::getAlumnos();

?>

    
<body>
  
<nav class="navbar bg-dark">
  <div class="container-fluid">
    <img src="../img/logo.png" alt="" width="50" height="24" class="d-inline-block align-text-top"></a>
    <form class="d-flex" role="search" action="../controller/logout.php" method="POST">
      <button class="btn btn-outline-danger" name="logout" type="submit">Log Out</button>
    </form>
  </div>
</nav>


<table class="table">
  
  <thead>
    <tr>
      <th scope="col">Fotografia</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Apellido2</th>
      <th scope="col">Correo</th>
      <th scope="col">DNI</th>
      <th scope="col"><input type="submit" class="btn btn-warning" value="Actualizar"></th>
      <th scope="col"><input type="submit" class="btn btn-danger" value="Eliminar"></th>
      <th scope="col"><input type="checkbox" class="form-check-input mt-0"></th>
    </tr>
  </thead>
  
  <tbody class="table-group-divider">
    <?php
      foreach ($listaAlumno as $registro){
      ?>
        <tr>
        <!-- Filas con todos los datos de los alumnos y labels que solo se mostrarán en mobiles -->
          <td data-label="Id"><?php echo"{$registro['matricula']}";?></td>
          <td data-label="Nombre"><?php echo"{$registro['nombre']}";?></td>
          <td data-label="Apellido"><?php echo"{$registro['apellido']}";?></td>
          <td data-label="Apellido"><?php echo"{$registro['apellido2']}";?></td>
          <td data-label="Apellido"><?php echo"{$registro['correo']}";?></td>
          <td data-label="Apellido"><?php echo"{$registro['dni']}";?></td>
        </tr>
      <?php } ?>
  </tbody>

</table>

</body>
</html>