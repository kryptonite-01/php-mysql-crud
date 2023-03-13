<?php 
/**
 * Conexion a MySQL
 */
class conexion
{
	private $servidor="localhost";
	private $database="proyectos";
	private $usuario="root";
	private $contrasenia="";
	private $conexion;

	public function __construct()
	{
		try {
			$this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->database",$this->usuario,$this->contrasenia);
			$this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			return "Error en la conexion a la base de datos: $e";
		}
	}

	public function ejecutar($sql)
	{
		$sentencia=$this->conexion->prepare($sql);
		$sentencia->execute();
		return $this->conexion->lastInsertId();
	}

	public function consultar($sql)
	{
		$sentencia=$this->conexion->prepare($sql);
		$sentencia->execute();
		return $sentencia->fetchAll();
	}
}
?>