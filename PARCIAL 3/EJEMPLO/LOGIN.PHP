<?php
session_start();

$user = $_POST['usuario'];

if(isset($_SESSION['usuario'])){
    printf("REAUNANDO SESION <br>");
    printf("BIENVENIDO DE NUEVO".$_SESSION['usuario']);
}else{
    $_SESSION['usuario'] = $user;
    printf("NUEVA SESIO <br>");
    printf("BIENVENIDO %s",$user);
}
?>