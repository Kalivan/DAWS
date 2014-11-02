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

	<!--Cargamos los scripst para el uso de lightbox-->
    <script src="lightbox/js/jquery-1.11.0.min.js"></script>
    <script src="lightbox/js/lightbox.min.js"></script>

    <!--Cargamos hoja de estilo para el uso de lightbox-->
    <link href="lightbox/css/lightbox.css" rel="stylesheet" />
    
    <!--Titulo y favicon-->
	<title>Fotos2 - Proyecto04</title>
    <link rel="shortcut icon" type="image/jpeg" href="img/favicon2.png" />

</head>

<?php
	//Creamos una nueva pagina para el visionado de las fotos a la que le pasamos un título y las filas y columnas que queremos que tenga la tabla que contendra las fotografias
	$pagina = new pagina();
	$pagina->setCabecera();
	$pagina->setCuerpoFotos("<center><h1>Fotos<br></h1></center>",1,6);
	$pagina->setPie();
	echo $pagina->getPagina();
?>

<body>
</body>
</html>