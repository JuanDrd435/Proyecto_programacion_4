<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}


if($_SERVER['REQUEST_METHOD']=='POST'){
	$id = $_POST['codigo'];
	//$id = filter_var(strtolower($_POST['codigo']),FILTER_SANITIZE_STRING);
	$nombre = $_POST['nombre'];
    $pais = $_POST['pais'];
	
	if(empty($id) or empty($nombre)){
		$errores.= '<li>Por favor rellena todos los tados correctamente</li>';
	}
	else{
		try{
			$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
		}catch(PDOException $e){
			echo "ERROR: " . $e->getMessge();
			die();
		}
		$statement = $conexion -> prepare(
			'SELECT * FROM CIUDAD WHERE ID_CIUDAD = :ciudad LIMIT 1');
		$statement ->execute(array(':ciudad'=>$id));
		$resultado= $statement->fetch();

		if($resultado != false){
			$errores .='<li>la Ciudad  ya existe</li>';
		}


	
	}

	if($errores==''){
		$statement = $conexion->prepare(
			'INSERT INTO CIUDAD VALUES
            (:id,:nombre,:id_pais)');
		$statement-> execute(array(
			':id' => $id,
			':nombre'=> $nombre,
            ':id_pais'=> $pais
           
			));
		header('Location: Ciudad.php');
	}
}
require 'vista/registro_ciudad_vista.php';

?>
