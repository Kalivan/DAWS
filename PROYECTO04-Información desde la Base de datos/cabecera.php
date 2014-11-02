<?php
require_once "elemento.php";

class cabecera extends elemento
{
	
	//Menu para la web que creamos con arrays multidimensionales, donde almacenamos el texto que mostrara cada boton y a que URL apuntara cada uno.
	private $menu=array(
		"home"=>array(
					"txt"=>"Inicio",
					//Enlace remoto
					//"url"=>"http://192.168.1.2/daws/proyecto04/"
					//Enlace local
					"url"=>"index.php"
					),
		"fotos"=>array(
					"txt"=>"submenu",
					"titulo"=>"Paises",
					"url"=>"#",
					//creamos un submenu para los paises agrupandolos por continentes
					"submenu"=>array(
						"Africa"=>array("txt"=>"África",
									//Enlace remoto
									//"url"=>"http://192.168.1.2/daws/proyecto04/fotos.php"),
									//Enlace local
									"url"=>"fotos.php"),
						"America"=>array("txt"=>"América",
									//Enlace remoto
									//"url"=>"http://192.168.1.2/daws/proyecto04/fotos2.php"),
									//Enlace local
									"url"=>"fotos2.php"),
						"Asia"=>array("txt"=>"Asia",
									//Enlace remoto
									//"url"=>"http://192.168.1.2/daws/proyecto04/fotos.php"),
									//Enlace local
									"url"=>"fotos.php"),
						"Europa"=>array("txt"=>"Europa",
									//Enlace remoto
									//"url"=>"http://192.168.1.2/daws/proyecto04/fotos2.php"),
									//Enlace local
									"url"=>"fotos2.php"),
						"Oceania"=>array("txt"=>"Oceania",
									//Enlace remoto
									//"url"=>"http://192.168.1.2/daws/proyecto04/fotos.php"),
									//Enlace local
									"url"=>"fotos.php"),
						)
					),
		"lugares"=>array(
					"txt"=>"Lugares",
					//Enlace remoto
					//"url"=>"http://192.168.1.2/daws/proyecto04/lugares.php"
					//Enlace local
					"url"=>"lugares.php"
					),
		"contacto"=>array(
					"txt"=>"Contacto",
					//Enlace remoto
					//"url"=>"http://192.168.1.2/daws/proyecto04/contacto.php"
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
		//Logo de la web
		$logo="<a id='logo'href='index.php'>LOGO</a>";
		
		//Creamos el menu con el submenu correspondiente
		$menu=$logo."<div id='cssmenu'><ul>";
		foreach($this->menu as $elementos){
			
			if(strcmp($elementos["txt"],"submenu")==0){
				$menu=$menu."<li><a href=".$elementos["url"].">".$elementos["titulo"]."</a>";
				$menu=$menu."<ul>";
				
				foreach($elementos["submenu"] as $submenu){
					$menu=$menu."<li><a href=".$submenu["url"].">".$submenu["txt"]."</a></li>";
				}
				$menu=$menu."</ul></li>";
			}else{
				$menu=$menu."<li><a href=".$elementos["url"].">".$elementos["txt"]."</a></li>";
			}
		}
		$menu=$menu."</ul></div>";
		$this->setContenido($menu);
	}
	
}
?>