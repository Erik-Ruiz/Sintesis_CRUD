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
        <img src="image/profile.jpg" alt="">
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
    <div class="tabla">
      <table class="table">
    
        <thead>
          <tr>
            <th scope="col">Matricula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Apellido 2</th>
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
          <td scope="col"><input type="checkbox" class="form-check-input mt-0"></td>
          <td scope="col"><input type="checkbox" class="form-check-input mt-0"></td>
        </tr>
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
  </section>
  

  <script src="../js/sidebar.js"></script>

</body>


</body>
</html>