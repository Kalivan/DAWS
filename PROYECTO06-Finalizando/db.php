<?php
	/**
	* db
	*
	* Gestor de Bases de datos utilizando la nueva api mejorada de php mysqli orientada a objetos
	*
	* @author Javier Lopez
	* @author http://
	*
	* @version 1.0
	*/
class db
{
	/**
	* string del servidor
	*/
	//private $servidor="localhost";
	private $servidor;
	/**
	* string del usuario
	*/
	//private $usuario="root";
	private $usuario;
	/**
	* string del password
	*/
	//private $pass="daw01";
	private $pass;
	/**
	* string de la base de datos
	*/
	//private $base_datos="lugares";
	private $base_datos;
	/**
	* descriptor a la conexión con la base de datos
	*/
	public $descriptor;
	/**
	* boolean que nos indica si ha habido exito al conectar o no
	*/
	private $conectado;
	/**
	* información del error o conexión habilitada
	*/
	private $info;
	
	function __construct($servidor,$usuario,$pass,$base_datos)
	{
		$this->servidor = $servidor;
		$this->usuario = $usuario;
		$this->pass = $pass;
		$this->base_datos = $base_datos;
		$this->conectado=false;
		$this->info="";
		
		//echo "Numero de argumentos: ".func_num_args();
		if(func_num_args()==1){
			$this->usuario = func_get_arg(0);
			$this->conectado=false;
			$this->info="";
		}elseif(func_num_args()==2){
			$this->usuario = func_get_arg(0);
			$this->pass = func_get_arg(1);
			$this->conectado=false;
			$this->info="";			
		}
	}
	
	/**
		* Realiza la conexión con la base de datos devolviendo el estado de la misma
		*
		* @return conectado boolean
	*/	
	public function conectar_base_datos()
	{
		$this->descriptor = new mysqli($this->servidor, $this->usuario, $this->pass, $this->base_datos);
		if ($this->descriptor->connect_errno) {
    		$this->$info="Fallo al conectar a MySQL: (" . $this->descriptor->connect_errno . ") " . $this->descriptor->connect_error;
			$this->conectado=false;
		}else{
			$this->info="Conectado al servidor MySQL: " .$this->descriptor->host_info;
			$this->conectado=true;
		}
		
		return $this->conectado;
	}
	
	/**
		* Devuelve el estado de la conexión actual
		*
		* @return info string
	*/	
	public function getInfo(){
		return $this->info;
	}

	//Funcion para autentificar un usuario en la base de datos
	public function autenticar($usuarioAPP,$passwordAPP){
			$passMD5=md5($passwordAPP);
	
			if($resultado = $this->descriptor->query("SELECT * FROM usuarios where usuario='".$usuarioAPP."' AND password='".$passMD5."'")){
				// compruebo llamada
				error_log($this->descriptor->affected_rows);
				if($this->descriptor->affected_rows>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}



	/**
		* Devuelve una tabla con todos los lugares almacenados en la tabla de la base de datos lugares
		*
		* @return str string
	*/	
	public function getLugares(){	
		$str="";
		if($resultado = $this->descriptor->query("SELECT * FROM lugares")){
			//Creamos la tabla con su estilo definido en el .css
			$str=$str."<div id='scroll' align='center'><table id='csslugares'><thead><tr><th>id</th><th>Lugar</th><th>Descripción</th><th>País</th><th>Provincia</th><th>Fecha</th></tr></thead>";
			for ($num_fila = 0; $num_fila < $resultado->num_rows; $num_fila++) {
				$resultado->data_seek($num_fila);
				$fila = $resultado->fetch_assoc();
				$str=$str."<tbody><tr>";
				$str=$str."<td>".$fila['id_lugar']."</td>";
				$str=$str."<td>".$fila['lugar']."</td>";
				$str=$str."<td>".$fila['descripcion']."</td>";
				$str=$str."<td>".$fila['pais']."</td>";
				$str=$str."<td>".$fila['provincia']."</td>";
				$str=$str."<td>".$fila['fecha']."</td>";
				$str=$str."</tr></tbody>";
			}
			$str=$str."</table></div>";
				
		}else{
			 printf("Error: %s\n", $this->descriptor->error);
		}
		return $str;
		
	}
	/**
		* Añade un nuevo registro con los datos introducidos en el formulario a la tabla de la base de datos lugares
		*
	*/	
	public function setLugar($lugar,$descripcion,$pais,$provincia,$fecha){
		if($resultado = $this->descriptor->query("INSERT INTO lugares (lugar,descripcion,pais,provincia,fecha) VALUES ('$lugar','$descripcion','$pais','$provincia','$fecha')")){
			//echo "OK<br>";
		}else{
			echo "ERROR<br>";
			 printf("Error: %s\n", $this->descriptor->error);
		}
	}
}
