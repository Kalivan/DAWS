<?php
require_once "elemento.php";
require_once "db.php";

class cuerpo extends elemento
{
	//Funcion que rellena el perfil y nos permitira editar nuestros datos
	function setPerfil($tit){
		
		$this->setTitulo($tit);
		$str="";
		
		//Almacenamos el usuario de la sesion
		$usuario=$_SESSION["usuario"];
		
		//Conectamos con la Base de Datos pasandole los datos de conexion
		$db=new db("localhost","root","Kalivan","lugares");
		$db->conectar_base_datos();
		
    	//Realizamos consulta a la base de datos para que nos devuelva los datos del usuario
		if($resultado = $db->descriptor->query("SELECT * FROM usuarios where usuario='".$usuario."'")){
			//Introducimos el resultado en una variable como un array asociativo
			//$registro = mysqli_fetch_array($resultado); 
			$registro = $resultado->fetch_assoc();
			
			//Si no tiene avatar guardado en la base de datos mostraremos el avatar predefinido
			if ($registro['avatar']==""){
				$registro['avatar']='user.png';
			}
			
			//Creamos el formulario para el perfil
			//<form name='añadir_datos' method='post' action='up.php'class='navbar-form' role='form'>
			$str="<form role='form' action='' method='post' enctype='multipart/form-data'
			<div>
			  <table width='200' border='0'>
				<tr>
				  <td><img src='img/avatar/".$registro['avatar']."' width='100' height='100' />
				  <p>&nbsp;</p></td>
				  	<td align='center'><input class='file' type='file' name='archivo' id='archivo'></input></td>
				</tr>
				<tr>
				  <td><p>Usuario: </p></td>
				  <td><input name='usuario' type='text' class='form-control' value='".$registro['usuario']."' disabled='disabled'/></td>
				</tr>
				<tr>
				  <td><p>Nombre: </p></td>
				  <td><input name='nombre' type='text' class='form-control' value='".$registro['nombre']."'/></td>
				</tr>
				<tr>
				  <td><p>Apellidos: </p></td>
				  <td><input name='apellidos' type='text' class='form-control' value='".$registro['apellidos']."'/></td>
				</tr>
				<tr>
				  <td><p>Email: </p></td>
				  <td><input name='email' type='text' class='form-control' value='".$registro['email']."'/></td>
				</tr>
			  </table>
			  </br>
				<input type='submit' name='enviar' id='enviar' value='Enviar' class='btn btn-success'/>
			  </div>
			</form>";
			
			//Si se envia el formulario
			if (isset($_POST['enviar'])){
				//Si hay un error con el archivo a subir
				if ($_FILES['archivo']["error"] > 0){
					//Si no se ha seleccionado ningun archivo lo notificamos con alerta
					if ($_FILES['archivo']['error'] == 4){
						echo "<script type='text/javascript'>alert('Debes seleccionar primero una imagen para poder cambiar el avatar');</script>";
					}
					//Si es otro error lo mostramos con alerta
					else{
						$error="Error: ".$_FILES['archivo']['error'];
						echo "<script type='text/javascript'>alert('$error');</script>";
					}
				//Si no hay error con el archivo
				}else{
					//Con la funcion move_uploaded_file guardaremos el nuevo avatar en la carpeta del servidor para los avatares (img/avatar) y notificamos que se ha guardado correctamente
					move_uploaded_file($_FILES['archivo']['tmp_name'],"img/avatar/". $_FILES['archivo']['name']);
					echo "<script type='text/javascript'>alert('Archivo enviado correctamente');</script>";
					
					//almacenamos en variables los campos del formulario para actualizar la informacion en la base de datos
					$nombre = $_POST['nombre'];
					$apellidos = $_POST['apellidos'];
					$email = $_POST['email'];
					$avatar = $_FILES['archivo']['name'];
					
					//Actualizamos los campos de la tabla usuarios de la BD con los nuevos datos
					//$db->descriptor->query("UPDATE usuarios SET avatar = '".$_FILES['archivo']['name']."'");
					$db->descriptor->query("UPDATE usuarios SET nombre='".$nombre."', apellidos='".$apellidos."', email='".$email."', avatar = '".$avatar."'");
					
					//Volvemos a crear la pantalla para actualizar los datos
					header("Location:index.php?id=7");
				}
			}

		}else{
			 printf("Error: %s\n", $db->descriptor->error);
		}
		
		$this->setContenido($str);
	}
	
	//Funcion que define la tabla de fotos con los parametros recibidos de titulo asi como las filas y columnas con las que creara la tabla
	function setTablaFotos($tit,$filas,$columnas)
	{
		$this->setTitulo($tit);
		
		$str="";
		$contador=1;
		$foto="";
		
		$str="<table align='center'>";
		for($i=1;$i<=$filas;$i++)
		{
			$str=$str."<tr>";
			for($j=1;$j<=$columnas;$j++)
			{
				//almacenamos en la variable foto el nombre de la imagen
				$foto="img/fotos/foto_0".$contador.".jpg";
				//guardamos la foto
				$str=$str."<td><a href=$foto data-lightbox=roadtrip data-title="."foto_0".$contador."><img src=$foto width=150 height=150></a></td>";
				$contador++;
			}
			$str=$str."</tr>";
		}
		$str=$str."</table>";
		
		$this->setContenido($str);
	}
	
	//Funcion que define la tabla de Lugares conectandose a la base de datos y nos permitira introduccir nuevos datos a la BD
	function setTablaLugares($tit)
	{
		$this->setTitulo($tit);
		
		//Conectamos con la Base de Datos pasandole los datos de conexion
		$db=new db("localhost","root","Kalivan","lugares");
		$db->conectar_base_datos();
		
		//Añadimos un boton para dar de alta nuevos lugares
		$str="<center><br><form name='añadir_datos' method='post' action=''class='navbar-form' role='form'>
							<input type='submit' name='añadir' id='añadir' value='Añadir Lugar' class='btn btn-success'/>
				</form></center>";

		//Si pulsamos sobre el boton de añadir lugar nos llevara a la pantalla con el formulario para añadir nuevo lugares
		if (isset($_POST['añadir'])){
			header("Location:index.php?id=5");
		}
		//Creamos el cuerpo de la pagina pasandole a la funcion encargada la tabla lugares y el boton para añadir nuevos registros	
		$this->setContenido($db->getLugares().$str);
		
	}
	
	//Funcion que nos permitira añadir nuevos lugares a la base de datos
	function setAñadirLugares($tit)
	{
		$this->setTitulo($tit);
		
		//Conectamos con la Base de Datos pasandole los datos de conexion
		$db=new db("localhost","root","Kalivan","lugares");
		$db->conectar_base_datos();
		
		//Añadimos un formulario para la introdución de nuevos datos en la DB
		$str="";
  		$str="<center><form name='añadir_datos' method='post' action=''class='navbar-form' role='form'>
						<fieldset style='width:50%;border-color:#C0C0C0; border-width:thin'>
							<legend align='center'><h4>Añadir Lugar</h4></legend>
							<p>
								<label for='lugar'>Lugar: </label><input name='lugar' type='text' class='form-control'/>
								<label for='pais'>Pais: </label><input type='text' name='pais' id='pais'class='form-control' />
								<label for='provincia'>Provincia: </label><input type='text' name='provincia' id='provincia'class='form-control' />
								<label for='fecha'>Fecha: </label><input type='text' name='fecha' id='fecha'class='form-control' />
								<br><br>
								<label for='descripción'>Descripción:<br></label><textarea name='descripcion' id='descripcion' cols='100' rows='3'class='form-control'></textarea>
								<br><br>
								<Input type='reset' name='borrar' id='borrar'value='Borrar Campos' class='btn btn-success'>
								<input type='submit' name='añadir' id='añadir' value='Añadir registro' class='btn btn-success'/>
							</p>
						</fieldset>
						</form></center>";
		
		//Si el formulario se envia, almacenamos en variables los campos introducidos por el usuario y luego se las pasamos a la funcion que las introducira en la base de datos				
		if (isset($_POST['añadir'])){
			
			$lugar = $_POST['lugar'];
        	$descripcion = $_POST['descripcion'];
        	$pais = $_POST['pais'];
        	$provincia = $_POST['provincia'];
			$fecha = $_POST['fecha'];
			//echo"Registro realizado".$lugar.$descripcion.$pais.$provincia.$fecha;
			$db->setLugar($lugar,$descripcion,$pais,$provincia,$fecha);
			//Una vez introducidos los valores en la base de datos volvemos a mostrar la tabla Lugares
			header("Location:index.php?id=4");
		}
		
		$this->setContenido($str);
	}
	
	//Funcion que define el cuerpo con un contenido simple recibiendo por parametro el titulo y el contenido
	function setContenidoSimple($tit,$str)
	{
		$this->setTitulo($tit);
		$this->setContenido($str);
	}
	
}
?>