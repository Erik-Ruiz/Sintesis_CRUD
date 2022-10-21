<?php
  session_start();
  if(empty($_SESSION['login'])){
    header("Location: ../pages/login.php");
    die();
  }
  require_once '../components/cabecera.html';
  
  require_once '../models/alumnos.php';

  //$listaAlumno=Alumno::getAlumno();

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


</body>
</html>