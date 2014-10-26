<?php
require_once "elemento.php";

class cuerpo extends elemento
{
	
	//Pasamos el titulo que tendra el Cuerpo de la pagina
	function __construct()
	{
		$this->setTitulo("<h2 align='center' style='color:blue'>FOTOGRAFIAS</h2>");
	}
	
	//Funcion que define la tabla
	function setTabla($filas,$columnas)
	{
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
				$foto="img/foto_0".$contador.".jpg";
				//guardamos la foto
				$str=$str."<td><a href=$foto data-lightbox=roadtrip data-title="."foto_0".$contador."><img src=$foto width=150 height=150></a></td>";
				$contador++;
			}
			$str=$str."</tr>";
		}
		$str=$str."</table>";
		
		$this->setContenido($str);
	}	
	
}
?>