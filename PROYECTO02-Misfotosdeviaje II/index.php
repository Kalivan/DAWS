<?php
	require "pagina.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!--Añadimos el titulo y el uso de LightBox2-->
<head>
	<title>Mis Fotos de Viajes</title>
    <meta charset='utf-8'>
    <meta name="author" content="Javier Lopez">

    <!--Cargamos los scripst para el uso de lightbox-->
    <script src="lightbox/js/jquery-1.11.0.min.js"></script>
    <script src="lightbox/js/lightbox.min.js"></script>

    <!--Cargamos hoja de estilo para el uso de lightbox-->
    <link href="lightbox/css/lightbox.css" rel="stylesheet" />

</head>

<?php
	//Creamos un web con unapagina con una tabla de 1 fila y 5 columnas que sera el Home
	$pagina = new pagina(1,5) ;
	$pagina->getPagina();
?>

<body>
</body>
</html>