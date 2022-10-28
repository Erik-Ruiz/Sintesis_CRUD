<?php
  session_start();
  if(empty($_SESSION['login'])){
    echo "<script>location.href='../pages/login.php'</script>";
    die();
  }
  
  require_once '../components/cabecera.html';
  
  require_once '../models/alumno.php';

  $lista=alumno::getAlumnos();
  $listaAlumno=$lista[0];
  $total_pages=$lista[1];
  $page=$lista[2];
  
?>


<head>

  <link rel="stylesheet" href="../css/sidebar.css">

</head>

    
<body>
<div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">CodingLab</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Category</a></li>
        </ul>
      </li>
      <li>
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
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Posts</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Posts</a></li>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Login Form</a></li>
          <li><a href="#">Card Design</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Analytics</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Analytics</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Chart</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
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
      <span class="text">Drop Down Sidebar</span>
    </div>

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
</nav> -->

    <div class="tabla" style="overflow: scroll;">
      <table class="table">
      <thead>
       <form class="d-flex" role="search">
          <tr>
            <th scope="col"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></th>
            <th scope="col"><input type="submit" class="btn btn-info" value="Buscar"></th>
          </tr>
        </form>
        </thead>
          <tr>
            <th scope="col">Matricula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Apellido 2</th>
            <th scope="col">Correo</th>
            <th scope="col">DNI</th>

            <th scope="col"><input type="checkbox" class="form-check-input mt-0"></th>
          </tr>
        
        
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
          <th scope="col"><input type="submit" class="btn btn-warning" value="Actualizar"></th>
            <th scope="col"><input type="submit" class="btn btn-danger" value="Eliminar"></th>        </tr>
      <?php } ?>
        <tr>
        <!-- Fila de paginación dinamica -->
          <td colspan="8">
          <div class="page-link">
            <a href="admin.php?page=1">&laquo;</a>
            <?php
            for($i=1; $i<=$total_pages; $i++){
              if($i==$page){?>
                <a class="active" href="admin.php?page=<?php echo $i?>"><?php echo $i?></a>
                <?php
              }else{?>
                <a href="admin.php?page=<?php echo $i ?>"><?php echo $i?></a>
                <?php
              }
          }
          ?>
              <a href="admin.php?page=<?php echo $total_pages ?>">&raquo;</a>
              </div>
            </td>
        </tr>
      </table>
    </div>
    <footer style="width: 100%; height: 50px; background: #e6a714;">

  <h5 > © 2022  - Todos los derechos reservados</h5>

</footer>
  </section>
  

  <script src="../js/sidebar.js"></script>

</body>


</body>
</html>