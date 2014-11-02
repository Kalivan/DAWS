<?php
	require_once "db.php";
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
	<title>Fotos - Proyecto04</title>
    <link rel="shortcut icon" type="image/jpeg" href="img/favicon2.png" />

</head>
	<?php
		//Conectamos con la Base de Datos pasandole los datos de conexion
		$db=new db("localhost","root","Kalivan","lugares");
		$db->conectar_base_datos();
		//echo $db->getInfo();
		//echo "</br>";
	
		//Creamos una nueva pagina para ver la tabla lugares y le pasamos un titulo, la tabla lugares y un formulario de registro
		$pagina = new pagina();
		$pagina->setCabecera();
		
		//Añadimos un formulario para la introdución de nuevos datos en la DB
		$formreg="";
  		$formreg=$formreg."<br><form id='añadir' name='añadir_datos' method='post' action=''>
						<fieldset style='width:50%;border-color:#C0C0C0; border-width:thin'>
							<legend align='center'><h4>Añadir Lugar</h4></legend>
							<p>
								<label for='lugar'>Lugar:</label><input name='lugar' type='text' />
								<label for='pais'>Pais:</label><input type='text' name='pais' id='pais' />
								<label for='provincia'>Provincia:</label><input type='text' name='provincia' id='provincia' />
								<label for='fecha'>Fecha:</label><input type='text' name='fecha' id='fecha' />
								<br><br>
								<label for='descripción'>Descripción:<br></label><textarea name='descripcion' id='descripcion' cols='100' rows='3'></textarea>
								<br><br>
								<Input type='reset' name='borrar' id='borrar'value='Borrar Campos'>
								<input type='submit' name='añadir' id='añadir' value='Añadir registro' />
							</p>
						</fieldset>
						</form>";
		
		//Si el formulario se envia, almacenamos en variables los campos introducidos por el usuario y luego se las pasamos a la funcion que las introducira en la base de datos				
		if (!empty($_POST['añadir'])){
				
			$lugar = $_POST['lugar'];
        	$descripcion = $_POST['descripcion'];
        	$pais = $_POST['pais'];
        	$provincia = $_POST['provincia'];
			$fecha = $_POST['fecha'];
			//echo"Registro realizado".$lugar.$descripcion.$pais.$provincia.$fecha;
			$db->setLugar($lugar,$descripcion,$pais,$provincia,$fecha);

		}
		
		//Creamos el cuerpo de la pagina pasandole a la funcion encargada un titulo, la tabla lugares y el formulario para añadir nuevos registros		
		$pagina->setCuerpoContenido("<center><h1>Lugares<br></h1>",$db->getLugares().$formreg,"</center>");
		$pagina->setPie();
		echo $pagina->getPagina();
		
	?>
<body>
</body>
</html>
