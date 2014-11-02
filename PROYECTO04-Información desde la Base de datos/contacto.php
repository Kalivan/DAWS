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
	<title>Contacto - Proyecto04</title>
    <link rel="shortcut icon" type="image/jpeg" href="img/favicon.png" />


</head>

<?php
	//Creamos una nueva pagina para el Contacto y le pasamos un título y una imagen con el link al mail de contacto 
	$pagina = new pagina();
	$pagina->setCabecera();
	$pagina->setCuerpoContenido("<center><h1>Contacto<br></h1>","<a href='mailto:kalivan2@gmail.com'><img src='img/mail.png'/></a></center> ");
	$pagina->setPie();
	echo $pagina->getPagina();
?>

<body>
</body>
</html>

