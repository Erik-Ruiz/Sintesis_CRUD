<?php
  session_start();

  if(empty($_SESSION['login'])){

    //echo "<script>location.href='../pages/login.php?nok=1'</script>";
    
  }
  
  require_once '../components/cabecera.html';
  
  require_once '../models/alumno.php';

  $lista=alumno::getAlumnos();
  $listaAlumno=$lista[0];
  $total_pages=$lista[1];
  $page=$lista[2];
  
?>
    
<body>
<div class="sidebar close">
    <a href="../pages/admin.php">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Notas</span>
    </div>
    </a>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Crear Alumno</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Crear Alumno</a></li>
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
      <span class="text">HOME</span>
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

    <div class="tabla" style="overflow: scroll;height:80vh">
      <table class="table" style="text-align:center ;">
      <thead>
       <form class="d-flex" role="search">
          <tr>
            <th></th>
            <th scope="col"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></th>
            <th scope="col" colspan="2"><input type="submit" class="btn btn-info" value="Buscar"></th>
          </tr>
        </form>
        </thead>
          <tr>
            <th scope="col">IMG</th>
            <th scope="col">Matricula</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Apellido 2</th>
            <th scope="col">Correo</th>
            <th scope="col">DNI</th>
            <th scope="col">Opciones</th>
            <th scope="col"><input id="check_all" onchange="correo(this)" type="checkbox" class="form-check-input mt-0"></th>
          </tr>
        
        
        <tbody class="table-group-divider">
    
      <?php
      foreach ($listaAlumno as $registro){
      ?>
        <tr>
        <!-- Filas con todos los datos de los alumnos y labels que solo se mostrarán en mobiles -->
          <td data-label="Img"><img src="../img/alum/<?php echo"{$registro['matricula']}";?>.png"/></td>
          <td data-label="Id"><?php echo"{$registro['matricula']}";?></td>
          <td data-label="Nombre"><?php echo"{$registro['nombre']}";?></td>
          <td data-label="Apellido"><?php echo"{$registro['apellido']}";?></td>
          <td data-label="Apellido2"><?php echo"{$registro['apellido2']}";?></td>
          <td data-label="Correo"><?php echo"{$registro['correo']}";?></td>
          <td data-label="DNI"><?php echo"{$registro['dni']}";?></td>
          <th scope="col">
            <div class="editar">
            

            <button type="button" class="btn btn-success" onclick=irVer(<?php echo"{$registro['id']})";?>><i class="fa-regular fa-eye"></i></button>

            <button type="button" class="btn btn-warning" onclick=irEditar(<?php echo"{$registro['id']})";?>><i class="fa-solid fa-pen-to-square"></i></button>

            <button type="button" class="btn btn-danger" onclick=irEliminar(<?php echo"{$registro['id']})";?>><i class="fa-solid fa-trash"></i></button>


            <!-- <a href="admin.php?id=<?php echo $registro['id']; ?>"><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>

            
              <a href="../controller/eliminarcontroller.php?id=<?php echo $registro['id']; ?>"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a> -->
            </div>

          </th>
          <th scope="col"><input id="check_<?php echo $registro['id']; ?>" onchange="correo(this)" type="checkbox" class="form-check-input mt-0"></th>        
          
          </tr>
      <?php } ?>
        <tr>
        <!-- Fila de paginación dinamica -->
          <td colspan="8">
          
            </td>
        </tr>
      </table>
    </div>

  </section>
  
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
  <script src="../js/sidebar.js"></script>
  <script src="../js/veralumnos.js"></script>

</body>


</body>
</html>