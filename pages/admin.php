<?php
  error_reporting(0);
  session_start();

  if(empty($_SESSION['login'])){

    echo "<script>location.href='../pages/login.php?nok=1'</script>";
    
  }
  
  require_once '../components/cabecera.html';
  
  require_once '../models/alumno.php';

  $lista=Alumno::getAlumnos();
  $listaAlumno=$lista[0];
  $total_pages=$lista[1];
  $page=$lista[2];

  
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
      <span class="text">HOME</span>
    </div>

    <div class="tabla" style="overflow: scroll;height:80vh">
      <table class="table" style="text-align:center ;">
      <thead>
       <form class="d-flex" role="search">
          <tr>
            <th></th>
            <th scope="col"><input class="form-control me-2" type="search" id="matricula" placeholder="Matricula" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" id="nombre" placeholder="Nombre" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" id="apellido" placeholder="Apellido" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" id="apellido2" placeholder="Apellido 2" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" id="correo" placeholder="Correo" aria-label="Search"></th>
            <th scope="col"><input class="form-control me-2" type="search" id="dni" placeholder="DNI" aria-label="Search"></th>
         </form>
          <th scope="col" colspan="2"><button onclick="filtro()"  class="btn btn-info">Buscar</button></th>
        </tr>
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
          <td data-label="Img"><img src="../img/alum/<?php echo"{$registro['matricula']}";?>.png?ran=<?php echo rand(0,100); ?>" /></td>
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
            <?php
            $url =explode('&page=', $_SERVER["REQUEST_URI"]);
            $url2 =explode('pages/', $url[0]);
            if(isset($_GET['nombre']) or isset($_GET['apellido']) or isset($_GET['apellido2']) or isset($_GET['correo']) or isset($_GET['dni']) or isset($_GET['matricula'])){?>
              <div class="page-link">
              <a href="<?php echo $url2[1]?>&page=1">&laquo;</a>
              <?php
                for($i=1; $i<=$total_pages; $i++){
                  if($i==$page){?>
                    <a class="active" href="<?php echo $url2[1]?>&page=<?php echo $i?>"><?php echo $i?></a>
                    <?php
                  }else{?>
                    <a href="<?php echo $url2[1]?>&page=<?php echo $i ?>"><?php echo $i?></a>
                    <?php
                  }
              }
              ?>
                  <a href="<?php echo $url2[1]?>&page=<?php echo $total_pages ?>">&raquo;</a>
                  </div><?php
            }else{
              ?>
               
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
              <?php
           }?>
           
  <script src="../js/sidebar.js"></script>
  <script src="../js/veralumnos.js"></script>
  <script src="../js/alerts-server.js"></script>
  <script src="../js/filtrado.js"></script>
</body>


</body>
</html>