<?php
  session_start();
  if(empty($_SESSION['login'])){
    //header("Location: ../pages/login.php");
    //die();
  }
  require_once '../components/cabecera.html';
  require_once '../models/alumno.php';
  $id=$_GET['id'];
  // $id=4;
  $infoAlumno=Alumno::getAlumnoId($id);
  
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


<div class='container-alumno'>
  <div class='info-alumno'>
    <img src=<?php echo "../img/alum/".$infoAlumno['matricula'].".png"; ?> alt="" class="img-alumno"/>
    <p><?php echo $infoAlumno['nombre']; ?> <?php echo $infoAlumno['apellido']; ?> <?php echo $infoAlumno['apellido2']; ?></p>
    <p>DAW 2</p>
    <button>Guardar</button>
  </div>

  <div class='info-materias'>

    <!-- Bucle Modulo -->
    
      <?php $infoMaterias=Alumno::getMateriasAlumno($id); 
      //var_dump($infoMaterias[0]);
      for ($i=0; $i < count($infoMaterias) ; $i++) { 
        
        echo "<div class='materia'><div class='materia-titulo'><h1>".$infoMaterias[$i][0]."</h1></div>";
      
      ?>



      <div class='materia-uf'>
        <table class='materia-tabla'>
          <tr>
            <th>UF</th>
            <th>Nota</th>
            <th>Editar</th>
          </tr>
          <!-- Bucle UFS -->
          <?php $infoNotas=Alumno::getNotasAlumno($id,$infoMaterias[$i][0]); 

          for ($u=0; $u < count($infoNotas) ; $u++) { 

          ?>
          <tr>
            <td><?php echo $infoNotas[$u][1]; ?></td>
            <td><?php echo $infoNotas[$u][2]; ?></td>
            <td><button type="button" class="btn btn-success" onclick="editNota(<?php echo $infoNotas[$u][0]; ?>,<?php echo $id ?>)">Edit</button>
              
            </td>
          </tr>

          <?php

          }
          ?>
        </table>

      </div>
      </div>
      <?php } ?>

    

  </div>

</div>
<script src="../js/veralumnos.js"></script>
</body>
</html>