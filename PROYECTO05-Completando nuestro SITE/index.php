<?php
	require "pagina.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <!-- meta -->
    <meta charset='utf-8'>
    <meta name="author" content="Javier Lopez">
	
	<!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen" />

	<!--  JS -->
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   	<script src="js/script.js"></script>

    <!--Titulo y favicon-->
	<title>Inicio - Proyecto04</title>
    <link rel="shortcut icon" type="image/jpeg" href="img/favicon.png" />

</head>
<body>
<?php

	//iniciamos sesion y comprobamos si el usuario se ha autentificado y guardamos en una variable si se ha logeado
	$login="no";
	session_start();
	if(isset($_SESSION["autentificado"])){
		if ($_SESSION["autentificado"] == "SI") {
			$login="si";
		}
	}

	//Al ser comun a todas las paginas se crea para todas igual
	$pagina = new pagina();
	$pagina->setCabecera();
	
	//si la variable id existe
	if (isset($_GET["id"]))
	{
		//Dependiento del id que le pasemos creara una pagina u otra
		switch($_GET["id"]){
			//Inicio
			case 1:
				$pagina->setCuerpoContenido("<center><h1>Inicio<br></h1>","Estas en la pagina de Inicio<center>");
				break;	
			//Fotos
			case 2:
			//Si se ha logueado
				if($login == "si")
				{
					$pagina->setCuerpoFotos("<center><h1>Fotos<br></h1></center>",2,4);
				}
				else {
					//$pagina->setCuerpoContenido("<center><h1 style='color:#F00'>Error<br></h1>","Debes iniciar sesión para poder acceder<center>");
					header("Location:index.php?login=no");
				}
				break;
			//Fotos 2
			case 3:
				if($login == "si")
				{
					$pagina->setCuerpoFotos("<center><h1>Fotos<br></h1></center>",1,6);
				}
				else {
					//$pagina->setCuerpoContenido("<center><h1 style='color:#F00'>Error<br></h1>","Debes iniciar sesión para poder acceder<center>");
					header("Location:index.php?login=no");
				}
				break;
			//Lugares
			case 4:
				//Si se ha logueado
				if($login == "si")
				{
					$pagina->setCuerpoLugares("<center><h1>Lugares<br></h1></center>");
				}
				else {
					//$pagina->setCuerpoContenido("<center><h1 style='color:#F00'>Error<br></h1>","Debes iniciar sesión para poder acceder<center>");
					header("Location:index.php?login=no");
				}
			break;
			//Contacto
			case 5:
				$pagina->setCuerpoContenido("<center><h1>Contacto<br></h1>","<a href='mailto:kalivan2@gmail.com'><img src='img/mail.png'/></a></center> ");
				break;
			//Inicio
			default;
				$pagina->setCuerpoContenido("<center><h1>Inicio<br></h1>","Estas en la pagina de Inicio<center>");
		}
		
	}
	
	else{
		//Inicio
		$pagina->setCuerpoContenido("<center><h1>Inicio<br></h1>","Estas en la pagina de Inicio<center>");
	}
	
	//Si se ha logueado
	if(isset($_GET["login"])){
		//Si no se ha logeado correctamente mostramos un error
		if($_GET["login"]=="no")
		{
			$pagina->setCuerpoContenido("<center><IMG src='img/error.png' />","<h3>Debes iniciar sesión para poder acceder</h3><center>");
		}
		//SI se ha logueado correctamente mostramos un mensaje de bienvenida con el nombre del usuario y avatar
		else if($login=="si"){
			$pagina->setCuerpoContenido("<center><h1>Bienvenido</h1><br><IMG src='img/user.png'/>","<h1>".$_SESSION["usuario"]."</h1><center>");
		}

		else {
			header("Location:index.php?login=no");
		}
	}
	
	
	//Al ser comun a todas las paginas se crea para todas igual
	$pagina->setPie();
	echo $pagina->getPagina();
	
?>

</body>
</html>