<?php
require_once "cabecera.php";
require_once "cuerpo.php";
require_once "pie.php";

class pagina
{
	//Construimos un Menu de cabecera llamando a la funcion constructMenu de cabecera.php
	function setCabecera()
	{
		$this->cabecera = new cabecera();
		$this->cabecera->constructMenu();	
	}
	
	//Construimos un Cuerpo para las paginas de contenido a la que le pasamos un título y el contenido
	function setCuerpoContenido($titulo, $str)
	{	
		$this->cuerpo = new cuerpo;
		$this->cuerpo->setContenidoSimple($titulo, $str);
	}
	
	//Construimos un Cuerpo para las paginas de fotoa a la que le pasamos un título y las filas y columnas que tendra la tabla que mostrara las fotos
	function setCuerpoFotos($titulo, $filas, $columnas)
	{
		$this->cuerpo = new cuerpo;
		$this->cuerpo->setTablaFotos($titulo,$filas,$columnas);	
	}
	
	//Construimos un pie de pagina
	function setPie()
	{
		$this->pie = new pie;
		$this->pie->setPie();
	}
	
	//Mostramos la pagina completa
	function getPagina()
	{
		echo $this->cabecera.$this->cuerpo.$this->pie;
	}
	
}
?>