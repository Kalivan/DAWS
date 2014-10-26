<?php
	require "pagina.php";
?>

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
	//Creamos un web con unapagina con una tabla de 3 filas y 2 columnas
	$pagina = new pagina (3,2);
	$pagina->getPagina();
	
?>

<body>
</body>
</html>