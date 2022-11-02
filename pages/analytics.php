<?php
  session_start();
  if(empty($_SESSION['login'])){
    echo "<script>location.href='../pages/login.php'</script>";
    die();
  }
  
  require_once '../components/cabecera.html';

  require_once '../models/alumno.php';
  
?>
<div class="sidebar close">
    <a href="../pages/admin.php">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Notas</span>
    </div>
    </a>
    <ul class="nav-links">
      <li>
      <a href="../pages/formulario.php">
          <i class='bx bx-grid-alt' ></i>
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
          <i class='bx bx-line-chart' ></i>
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
      <span class="text">ANALYTICS</span>
    </div>

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Materia</th>
                <th scope="col">Nota Media</th>
                <th scope="col">Mejor Nota</th>
                <th scope="col">Mejor Alumno</th>
                <th scope="col">Ver Alumno</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php
          

          $lista=Alumno::getGeneralNota();
          
          $pos=1;
        foreach ($lista as $registro){

          ?>
          <tr>
            <td data-label="Apellido"><?php echo "$pos";?></td>
            <td data-label="Apellido"><?php echo "{$registro[1]}";?></td>
            <td data-label="Apellido"><?php echo "{$registro[0] }";?></td>
            <td data-label="Apellido"><?php echo "{$registro[2] }";?></td>

            <?php $mejoAlumno = Alumno::getMejorAlumno($registro[1]) ?>
            <td data-label="Apellido">
              <?php echo $mejoAlumno['nombre']." ".$mejoAlumno['apellido']." ".$mejoAlumno['apellido2'] ?>
            </td>

            <td><button class="btn btn-success"  onclick=irVer(<?php echo $mejoAlumno['id'];?>)><i class="fa-regular fa-eye"></i></button></td>
          </tr>
          <?php 
          $pos++;
        }
          ?>
        </tbody>
        </table>

  </section>

  <script src="../js/sidebar.js"></script>
  <script src="../js/veralumnos.js"></script>


    <!-- <nav class="navbar navbar-expand-lg bg-light">
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
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
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
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>