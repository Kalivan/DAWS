<?php
require_once "elemento.php";

class cabecera extends elemento
{
	
	//En este caso no tendrá titulo
	function __construct()
	{
		$this->setTitulo("");	
	}
	
	//Funcion que define el menu de la cabecera
	function setMenu($numElementos)
	{

		$str="<a href=index.php>Home</a>&nbsp;";
		
		for($i=1;$i<=$numElementos;$i++)
		{
			
			$str=$str."<a href=pagina".$i.".php>Pagina".$i."</a>&nbsp;";

		}
		$this->setContenido("<h4 align='center'>".$str."</h4>");
	}
	
}
?>