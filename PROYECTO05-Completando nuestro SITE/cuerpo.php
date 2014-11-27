<?php
require_once "elemento.php";
require_once "db.php";

class cuerpo extends elemento
{
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
	
	//Funcion que define la tabla de Lugares conectandose a la base de datos y añade un formulario de introduccion de nuevos datos a la BD
	function setTablaLugares($tit)
	{
		$this->setTitulo($tit);
		
		//Conectamos con la Base de Datos pasandole los datos de conexion
		$db=new db("localhost","root","Kalivan","lugares");
		$db->conectar_base_datos();
		
		//Añadimos un formulario para la introdución de nuevos datos en la DB
		$formreg="";
  		$formreg="<center><br><form name='añadir_datos' method='post' action=''class='navbar-form' role='form'>
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

		}
		
		//Creamos el cuerpo de la pagina pasandole a la funcion encargada un titulo, la tabla lugares y el formulario para añadir nuevos registros	
		$this->setContenido($db->getLugares().$formreg);
		
	}
	
	//Funcion que define el cuerpo con un contenido simple recibiendo por parametro el titulo y el contenido
	function setContenidoSimple($tit,$str)
	{
		$this->setTitulo($tit);
		$this->setContenido($str);
	}
	
}
?>