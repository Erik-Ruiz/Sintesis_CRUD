<?php

    //require_once '../components/cabecera.html';

?> 
<header>


<link rel="stylesheet" href="../css/formulario.css">

</header>
<body>
    

  
<!-- <nav class="navbar bg-dark">
  <div class="container-fluid">
    <img src="../img/logo.png" alt="" width="50" height="24" class="d-inline-block align-text-top"></a>
    <form class="d-flex" role="search" action="../pages/login.php" method="POST">
      <button class="btn btn-outline-success" name="login" type="submit">Log In</button>
    </form>
  </div>
</nav> -->
<?php
if(!isset($_GET['id'])){
  $action = "../controller/crearcontroller.php";
}else{
  $action = "../controller/ediatrcontroller.php";
}
?>
<div class="container">
  <form class="form" action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
    <h2>ALUMNO</h2>
    <?php 
    if(!isset($_GET['id'])){
    ?>
    <p type="Nombre:"><input type="text" name="nombre"></input></p>
    <p type="Primer apellido:"><input type="text" name="apellido"></input></p>
    <p type="Segundo apellido:"><input type="text" name="apellido2"></input></p>
    <p type="Correo:"><input type="email" name="correo"></input></p>
    <p type="DNI:"><input type="text" name="dni"></input></p>
    <p type="Telf.:"><input type="text" name="telefono"></input></p>
    
    <?php
    }else{
      $id=$_GET['id'];
      require_once '../models/alumno.php';
      $infoAlumno=Alumno::getAlumnoId($id);
    ?>
    <p type="Nombre:"><input type="text" name="nombre" value="<?php echo $infoAlumno['nombre'] ?>"></input></p>

    <p type="Primer apellido:"><input type="text" name="apellido" value="<?php echo $infoAlumno['apellido'] ?>"></input></p>

    <p type="Segundo apellido:"><input type="text" name="apellido2" value="<?php echo $infoAlumno['apellido2'] ?>"></input></p>

    <p type="Correo:"><input type="email" name="correo" value="<?php echo $infoAlumno['correo'] ?>"></input></p>

    <p type="DNI:"><input type="text" name="dni" value="<?php echo $infoAlumno['dni'] ?>"></input></p>

    <p type="Telf.:"><input type="text" name="telefono" value="<?php echo $infoAlumno['telefono'] ?>"></input></p>

    <input type="hidden" name="id" value="<?php echo $_POST['id'] ?>"></input>

    <?php
    }

    ?>
    <p type="IMG"><input type="file" name="fileToUpload"></input></p>
    <button type="submit">Guardar</button>

    
  </form>
</div>


</body>
</html>