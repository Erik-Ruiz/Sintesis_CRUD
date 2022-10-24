<?php
session_start();
$logout = $_POST['logout'];

if(isset($logout)){
    session_destroy();
    echo "<script>location.href='../pages/login.php'</script>";
}else{
    echo "<script>location.href='../pages/info.php'</script>";
}