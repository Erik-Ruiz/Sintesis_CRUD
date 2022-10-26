<?php

//Recogemos la contraseña de login.php y la encriptamos en sha256 para que en nuestra base de datos reconozca
try{
    $pass = $_POST['pass'];
    $pass = hash('sha256', $pass);

    //Llamamos la conexión de la base de datos
    require_once 'connection.php';
    //verificamos si el usuario no lleva ningun caracter raro, que podría ocasionar a un SQL INJECTION
    $user=strtolower(mysqli_real_escape_string($conexion,$_POST['mail']));

    // selecionamos en la base de datos los datos introducidos arriba para comprobar si existen
    $sql = "select * from tbl_admin where Usuario='$user' and Contraseña='$pass'";
    $resultado = mysqli_query($conexion,$sql);
    $num=mysqli_num_rows($resultado);
    mysqli_free_result($resultado);

    //Si existen creamos la session, si no enviamos a login.php 
    if ($num==1){
        session_start();
        $_SESSION['login'] = $user;
        echo "<script>location.href='../pages/admin.php'</script>";
    }else{
        echo "<script>location.href='../pages/login.php?log=1'</script>";
    }

}catch(Exception $e){
    echo "<script>location.href='../pages/login.php?log=2'</script>";
}
