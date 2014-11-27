<?php
//vemos si el usuario y contraseña es váildo
if ($_POST["usuario"]=="Javi" && $_POST["password"]=="12345"){
    //usuario y contraseña válidos
    //defino una sesion y guardo datos
    session_start();
    $_SESSION["autentificado"]= "SI";
	$_SESSION["usuario"] = $_POST["usuario"];
    //header ("Location:aplicacion.php");
	header("Location:index.php?login=si");
}else {
    //si no existe le mando otra vez a la portada
    header("Location:index.php?login=no");
}
?> 