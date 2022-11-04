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
<div class="sidebar close">
    
    <div class="logo-details">
      <i class='bx bx-notepad'></i>
      
      <span class="logo_name">Notas</span>
    </div>
    
    <ul class="nav-links">
      <li>
        <a href="../pages/admin.php">
        <i class='bx bx-list-ol' ></i>
          <span class="link_name">Listado alumnos</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../pages/admin.php">Listado alumnos</a></li>
        </ul>
      </li>
      <li>
        <a href="../pages/formulario.php">
          <i class='bx bxs-user-plus'></i>
          <span class="link_name">Crear Alumno</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../pages/formulario.php">Crear Alumno</a></li>
        </ul>
      </li>

      <!-- <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Category</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Category</a></li>
          <li><a href="#">HTML & CSS</a></li>
          <li><a href="#">JavaScript</a></li>
          <li><a href="#">PHP & MySQL</a></li>
        </ul>
      </li> -->
      
      <li>
      <li>
        <a href="./correo.php">
          <i class='bx bx-envelope' ></i>
          <span class="link_name">Crear Correo</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../pages/correo.php">Crear Correo</a></li>
        </ul>
      </li>

      <li>
        <a href="./analytics.php">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="../pages/analytics.php">Analytics</a></li>
        </ul>
      </li>

      

      
      <li>
        <div class="profile-details">
          <div class="profile-content">
            <?php
              $img="../img/alum/".$_SESSION['img'].".png";
            ?>
            <img src=<?php echo $img; ?> />
          </div>
          <div class="name-job">
            <div class="profile_name"><?php echo "$_SESSION[login]"; ?></div>
            <div class="job"><?php echo $_SESSION['rol']; ?></div>
          </div>
            <a name="logout" href="../controller/logout.php?logout=true" ><i class='bx bx-log-out' ></i></a>
        </div>
      </li>
    </ul>
  </div>

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">ALUMNO</span>
    </div>

    <div class='container-alumno'>
  <div class='info-alumno'>
    <?php 
    if($infoAlumno['matricula']!=''){
      $foto="../img/alum/".$infoAlumno['matricula'].".png";
    }else{
      $foto="../img/guest-user.jpg";
    }
    ?>
    <img src=<?php echo $foto; ?> alt="" class="img-alumno"/>
    
    <div class="datos-alum">
      <p><?php echo $infoAlumno['nombre']; ?> <?php echo $infoAlumno['apellido']; ?> <?php echo $infoAlumno['apellido2']; ?></p>
      <p>DAW 2</p>
      <p>Media: <?php echo Alumno::getMediaAlumno($infoAlumno['id'])['media'] ?></p>
    </div>
    
  </div>

  <div style="overflow-y: scroll;" class='info-materias'>

    <!-- Bucle Modulo -->
    
      <?php $infoMaterias=Alumno::getMateriasAlumno($id); 
      //var_dump($infoMaterias[0]);
      for ($i=0; $i < count($infoMaterias) ; $i++) { 
        
        echo "<div  class='materia'><div class='materia-titulo'><h1>".$infoMaterias[$i][0]."</h1></div>";
      
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
</section>

  
<!-- <nav class="navbar bg-dark">
  <div class="container-fluid">
    <img src="../img/logo.png" alt="" width="50" height="24" class="d-inline-block align-text-top"></a>
    <form class="d-flex" role="search" action="../controller/logout.php" method="POST">
      <button class="btn btn-outline-danger" name="logout" type="submit">Log Out</button>
    </form>
  </div>
</nav> -->

<script src="../js/veralumnos.js"></script>
<script src="../js/alerts-server.js"></script>
<script src="../js/sidebar.js"></script>
</body>
</html>