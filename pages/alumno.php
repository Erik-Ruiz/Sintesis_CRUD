<?php
  session_start();
  if(empty($_SESSION['login'])){
    //header("Location: ../pages/login.php");
    //die();
  }
  require_once '../components/cabecera.html';

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
    <img src="../img/logo.png" alt="" class="img-alumno"/>
    <p>Sergio Merino Saceda</p>
    <p>DAW 2</p>
    <button>Guardar</button>
  </div>

  <div class='info-materias'>

    <div class='materia'>
      <div class='materia-titulo'>
        <p>MP07</p>
      </div>

      <div class='materia-uf'>
        <table class='materia-tabla'>
          <tr>
            <th>UF</th>
            <th>Nota</th>
          </tr>

          <tr>
            <td>1</td>
            <td>7.5</td>
          </tr>


        </table>

      </div>

    </div>

  </div>

</div>

</body>
</html>