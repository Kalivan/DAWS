<?php
require_once "elemento.php";

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
	
	//Funcion que define el cuerpo con un contenido simple recibiendo por parametro el titulo y el contenido
	function setContenidoSimple($tit,$str)
	{
		$this->setTitulo($tit);
		$this->setContenido($str);
	}
	
}
?>