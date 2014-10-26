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
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="screen" />

    <!--Titulo y favicon-->
	<title>Contacto - Proyecto03</title>
    <link rel="shortcut icon" type="image/jpeg" href="img/favicon.png" />


</head>

<?php
	//Creamos una nueva pagina para el Contacto y le pasamos un título y un mail con su link correspondiente 
	$pagina = new pagina();
	$pagina->setCabecera();
	$pagina->setCuerpoContenido("<center><h1>Contacto<br></h1>","Enviame un correo a <a href='mailto:kalivan2@gmail.com'>kalivan2@gmail.com</a></center> ");
	$pagina->setPie();
	echo $pagina->getPagina();
?>

<body style="background: url(img/bgnoise_lg.png) repeat left top;">
</body>
</html>

