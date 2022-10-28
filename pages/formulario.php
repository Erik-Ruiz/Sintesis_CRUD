<?php

    require_once '../components/cabecera.html';

?>
<header>


<link rel="stylesheet" href="../css/formulario.css">

</header>
<body>
    

  
<nav class="navbar bg-dark">
  <div class="container-fluid">
    <img src="../img/logo.png" alt="" width="50" height="24" class="d-inline-block align-text-top"></a>
    <form class="d-flex" role="search" action="../pages/login.php" method="POST">
      <button class="btn btn-outline-success" name="login" type="submit">Log In</button>
    </form>
  </div>
</nav>

<form class="form">
  <h2>ALUMNO</h2>
  <p type="Nombre:"><input></input></p>
  <p type="Primer apellido:"><input></input></p>
  <p type="Segundo apellido:"><input></input></p>
  <p type="Correo:"><input></input></p>
  <p type="DNI:"><input></input></p>

  <button>Guardar</button>
  <p><input type="hidden"></input></p>
</form>

</body>
</html>