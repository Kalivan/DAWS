<?php
require_once "cabecera.php";
require_once "cuerpo.php";
require_once "pie.php";

class pagina
{
	public $titulo="TITULO DE LA PAGINA";
	private $cabecera,$cuerpo,$pie;
	
	function __construct($filas, $columnas)
	{
		//Construimos una cabecera con 3 puntos (Paginas) de menu (+ el Home)
		$cabecera=3;
		$this->cabecera = new cabecera();
		$this->cabecera->setMenu($cabecera);
		//Construimos el cuerpo de la pagina con una tabla con las filas y columnas que nos pase la pagina
		$this->cuerpo = new cuerpo;
		$this->cuerpo->setTabla($filas,$columnas);
		//Construimos un pie de pagina
		$this->pie = new pie;
		$this->pie->setPie();
	}
	
	function getPagina()
	{
		echo $this->cabecera.$this->cuerpo.$this->pie;
	}
	
}
?>