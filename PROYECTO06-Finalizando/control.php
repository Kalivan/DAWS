<?php

require_once("db.php");

//Objeto base de datos
$db=new db("localhost","root","Kalivan","lugares");

//Conexion con la base de datos
$db->conectar_base_datos();

//vemos si el usuario y contraseña es váildo
if ($db->autenticar($_POST["usuario"],$_POST["password"])) {
//if ($_POST["usuario"]=="Javi" && $_POST["password"]=="12345"){
	
	//borramos la cookie de limites de acceso
	setcookie("errores","",time() -3600);
	
    //defino una sesion y guardo los datos del usuario que acaba de iniciar sesion
    session_start();
    $_SESSION["autentificado"]= "SI";
	$_SESSION["usuario"] = $_POST["usuario"];
	header("Location:index.php?login=si");
	
}else {
    //si no existe le mando otra vez al index y creamos la cookie de limite de sesion si no existe
    header("Location:index.php?login=no");
	if(!isset($_COOKIE["errores"])){
		setcookie("errores",1,time()+60);
	}
}
?> 