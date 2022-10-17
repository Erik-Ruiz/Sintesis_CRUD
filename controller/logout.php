<?php
session_start();
$logout = $_POST['logout'];

if(isset($logout)){
    session_destroy();
    header("Location: ../pages/login.php");
}else{
    header("Location: ../pages/info.php");
}