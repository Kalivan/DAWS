<?php
require_once "elemento.php";

class cabecera extends elemento
{
	
	//Menus para la web que creamos con arrays multidimensionales, donde almacenamos el texto que mostrara en cada boton y a que URL apuntara cada uno.
	//Creamos un menu publico y otro privado solo para usuarios registrados
	
	private $menupublico=array(
		"home"=>array(
						"txt"=>"Inicio",
						//Enlace remoto
						//"url"=>"http://kalivan.no-ip.org/daws/proyecto04/index.php?id=1"
						//Enlace local
						"url"=>"index.php?id=1"
					),
		"contacto"=>array(
					"txt"=>"Contacto",
					//Enlace remoto
					//"url"=>"http://kalivan.no-ip.org/daws/proyecto04/index.php?id=5"
					//Enlace local
					"url"=>"index.php?id=6"
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
	
	private $menuprivado=array(
		"home"=>array(
						"txt"=>"Inicio",
						//Enlace remoto
						//"url"=>"http://kalivan.no-ip.org/daws/proyecto04/index.php?id=1"
						//Enlace local
						"url"=>"index.php?id=1"
					),
		"perfil"=>array(
						"txt"=>"Perfil",
						//Enlace remoto
						//"url"=>"http://kalivan.no-ip.org/daws/proyecto04/index.php?id=1"
						//Enlace local
						"url"=>"index.php?id=7"
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
					"url"=>"index.php?id=6"
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
								
								//Creamos variable para mostrar el menu privado
								$menuusuario = $this->menuprivado;
								
								//Mostramos el usuario registrado
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
							//Creamos variable para mostrar el menu publico
							$menuusuario = $this->menupublico;
							
							//Si la cookie de limite de sesion no existe(no se ha intentado acceder aun) o es menor o igual a 3 intentos de acceso seguimos mostramos el registro
							if(!isset($_COOKIE["errores"]) || $_COOKIE["errores"]<=3){
							$registro="<!-- Registro -->
									<div id='registro'>
			
										<form action='control.php' method='POST' class='navbar-form navbar-right' role='form'>
											<input type='text' name='usuario' placeholder='Usuario' class='form-control'>
											<input type='password' name='password' placeholder='Password' class='form-control'>
											<button type='submit' class='btn btn-success'>Entrar</button>
											
											<!--<div> Link para nuevo registro
												<p align='right'><a href='index.php?id=7'>Registrarse</a></p>
											</div>-->
										</form>
			
									<div class='clear'></div>
									  
									</div> <!-- /Registro -->
								</div> <!-- /cabecera -->";
							}
							//Si se ha superado el numero de intentos de acceso mostramos logo de bloqueo
							else{
									$registro="<!-- Registro -->
										<div id='registro'>
											<!--<p>Deberás esperar 1 minuto para volver a intentarlo</p>-->
											<!--<a href='index.php?login=no'><IMG src='img/bloqueado.png' /></a>-->
											<IMG src='img/bloqueado.png' />
											
										<div class='clear'></div>
										  
										</div> <!-- /Registro -->
										</div> <!-- /cabecera -->";
							}
							
						}
		
		
		//Creamos el menu con el submenu correspondiente
		$menu=$cabecera.$registro."<div id='cssmenu'><ul>";
		
						//Usamos la variable menuusuario para mostrar el menu publico o el privado
						foreach($menuusuario as $elementos){
							
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