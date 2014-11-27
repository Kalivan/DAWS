<?php
require_once "elemento.php";

class cabecera extends elemento
{
	
	//Menu para la web que creamos con arrays multidimensionales, donde almacenamos el texto que mostrara cada boton y a que URL apuntara cada uno.
	private $menu=array(
		"home"=>array(
						"txt"=>"Inicio",
						//Enlace remoto
						//"url"=>"http://kalivan.no-ip.org/daws/proyecto04/index.php?id=1"
						//Enlace local
						"url"=>"index.php?id=1"
					),
		"fotos"=>array(
						"txt"=>"submenu",
						"titulo"=>"Paises",
						"url"=>"#",
						//creamos un submenu para los paises agrupandolos por continentes
						"submenu"=>array(
										"Africa"=>array(
														"txt"=>"África",
														//Enlace remoto
														//"url"=>"http://kalivan.no-ip.org/daws/proyecto04/index.php?id=2"),
														//Enlace local
														"url"=>"index.php?id=2"
													),
										"America"=>array(
														"txt"=>"América",
														//Enlace remoto
														//"url"=>"http://kalivan.no-ip.org/daws/proyecto04/index.php?id=3"),
														//Enlace local
														"url"=>"index.php?id=3"
													),
										"Asia"=>array(
														"txt"=>"Asia",
														//Enlace remoto
														//"url"=>"http://kalivan.no-ip.org/daws/proyecto04/index.php?id=2"),
														//Enlace local
														"url"=>"index.php?id=2"
													),
										"Europa"=>array(
														"txt"=>"Europa",
														//Enlace remoto
														//"url"=>"http://kalivan.no-ip.org/daws/proyecto04/index.php?id=3"),
														//Enlace local
														"url"=>"index.php?id=3"
													),
										"Oceania"=>array(
														"txt"=>"Oceania",
														//Enlace remoto
														//"url"=>"http://kalivan.no-ip.org/daws/proyecto04/index.php?id=2"),
														//Enlace local
														"url"=>"index.php?id=2"
													),
									)
					),
		"lugares"=>array(
					"txt"=>"Lugares",
					//Enlace remoto
					//"url"=>"http://kalivan.no-ip.org/daws/proyecto04/index.php?id=4"
					//Enlace local
					"url"=>"index.php?id=4"
					),
		"contacto"=>array(
					"txt"=>"Contacto",
					//Enlace remoto
					//"url"=>"http://kalivan.no-ip.org/daws/proyecto04/index.php?id=5"
					//Enlace local
					"url"=>"index.php?id=5"
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
	
	//Construimos la cabecera y el menu de la web a partir del array que creamos
	function constructMenu()
	{
		//Cabecera de la web
		$cabecera="<!-- Cabecera -->
    				<div id='cabecera'>

        				<!-- Logo -->
        				<a id='logo'href='index.php'>LOGO</a>";
						
			//Comprobamos si se ha iniciado una sesion con un usuario valido
			if(isset($_SESSION["autentificado"])){
				if ($_SESSION["autentificado"] == "SI") {
					$registro="<!-- Registro -->
						<div id='registro'>"
							//Mostramos el nombre del usuario conectado y un boton de logout
							."<h1 style='display:inline'>".$_SESSION["usuario"]." </h1><a  href='salir.php'><IMG src='img/logout2.png' /></a>
							
							<div class='clear'></div>
						</div> <!-- /Registro -->
						</div> <!-- /cabecera -->";
				}
			}
			else{
				//Si no hay unna sesion iniciada o el usuario es incorrecto mostramos el registro
				$registro="<!-- Registro -->
						<div id='registro'>

							<form action='control.php' method='POST' class='navbar-form navbar-right' role='form'>
								  <input type='text' name='usuario' placeholder='Usuario' class='form-control'>
								  <input type='password' name='password' placeholder='Password' class='form-control'>
								<button type='submit' class='btn btn-success'>Entrar</button>
							</form>

						<div class='clear'></div>
						  
						</div> <!-- /Registro -->
						</div> <!-- /cabecera -->";
				
			}
		
		//Creamos el menu con el submenu correspondiente
		$menu=$cabecera.$registro."<div id='cssmenu'><ul>";
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