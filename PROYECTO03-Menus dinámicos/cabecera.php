<?php
require_once "elemento.php";

class cabecera extends elemento
{
	
	//Menu para la web que creamos con arrays multidimensionales, donde almacenamos el texto que mostrara cada boton y a que URL apuntara cada uno.

	private $menu=array(
		"home"=>array(
					"txt"=>"Inicio",
					//Enlace remoto
					//"url"=>"http://192.168.1.2/daws/proyecto03/"
					//Enlace local
					"url"=>"index.php"
					),
		"fotos"=>array(
					"txt"=>"Fotos",
					//Enlace remoto
					//"url"=>"http://192.168.1.2/daws/proyecto03/fotos.php"
					//Enlace local
					"url"=>"fotos.php"
					),
		"contacto"=>array(
					"txt"=>"Contacto",
					//Enlace remoto
					//"url"=>"http://192.168.1.2/daws/proyecto03/contacto.php"
					//Enlace local
					"url"=>"contacto.php"
					),
		"fecebook"=>array(
					"txt"=>"Facebook",
					"url"=>"http://facebook.es"
					),
		"twitter"=>array(
					"txt"=>"Twitter",
					"url"=>"http://twitter.com"
					)
	);
	
	
	//Construimos el menu de la web a partir del array que creamos
	
	function constructMenu()
	{
		$menu="<center><div class=\"menu\"><ul class=\"nav\"id=\"navigation\">";
		foreach($this->menu as $elementos){
			$menu=$menu."<li><a href=".$elementos["url"].">".$elementos["txt"]."</a></li>";
		}
		$menu=$menu."</ul></div></center>";
		$this->setContenido($menu);
	}
	
	
}
?>