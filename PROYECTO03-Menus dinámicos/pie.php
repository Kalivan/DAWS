<?php
require_once "elemento.php";

class pie extends elemento
{
	
	//Funcion que define el pie de la pagina
	function setPie()
	{
		$str="";
		$str="<hr><center><p>Creado por Javier López</p></center></hr>";
		$this->setContenido($str);
	}
	
}
?>