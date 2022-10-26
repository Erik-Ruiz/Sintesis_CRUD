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


<head>

  <link rel="stylesheet" href="../css/sidebar.css">

</head>

    
<body>

<!-- <header>

  <nav class="navbar bg-dark">
    <div class="container-fluid">
      <img src="../img/logo.png" alt="" width="50" height="24" class="d-inline-block align-text-top"></a>
      <form class="d-flex" role="search" action="../controller/logout.php" method="POST">
        <button class="btn btn-outline-danger" name="logout" type="submit">Log Out</button>
      </form>
    </div>
  </nav>

</header> -->


<<<<<<< HEAD
<table class="table">
=======
<!-- <div class="form-group align-items-center">
  <form action="#" method="POST">
  
    <label for="fname">Nombre</label>
    <input type="text" name="name" value="Nombre";>

    <label for="lname">Apellido</label>
    <input type="text" name="edad" value="Apellido">

    <label for="marks">Nota</label>
    <input type="number" name="nota" value="Nota">

    <br>
    <input type="submit" class="btn btn-warning" value="Actualizar">
    
    <br>
    <input type="submit" class="btn btn-danger" value="Eliminar">
    
    <br>
    <input type="checkbox" class="form-check-input mt-0">

  </form>

</div> -->


<!-- <div>

<nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <a class="navbar-brand" href="#">fas</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Pricing</a>
        <a class="nav-link disabled">Disabled</a>
      </div>
    </div>
  </div>
</nav>


  <table class="table">
>>>>>>> b70a8b03f8a20f7c5ab836308d9a20d029c5748c
  
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
</div> -->
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
        <img src="image/profile.jpg" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">Prem Shahi</div>
        <div class="job">Web Desginer</div>
      </div>
      <i class='bx bx-log-out' ></i>
    </div>
  </li>
</ul>
  </div>

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Drop Down Sidebar</span>
    </div>

    <table class="table">
  
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Nota</th>
          <th scope="col"><input type="submit" class="btn btn-warning" value="Actualizar"></th>
          <th scope="col"><input type="submit" class="btn btn-danger" value="Eliminar"></th>
          <th scope="col"><input type="checkbox" class="form-check-input mt-0"></th>
        </tr>
      </thead>
      
      <tbody class="table-group-divider">
    
      </table>
  </section>

  <script src="../js/sidebar.js"></script>

</body>


</body>
</html>