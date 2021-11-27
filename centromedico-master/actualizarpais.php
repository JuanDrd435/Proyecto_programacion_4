<?php session_start();
if(!isset($_SESSION['usuario'])){
	header('Location: login.php');
}
require 'funciones.php';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "ERROR: " . $e->getMessge();
	die();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
	$id = limpiarDatos($_POST['codigo']);
	$nombre = limpiarDatos($_POST['nombre']);
	
	
	$statement = $conexion->prepare(
		"UPDATE PAIS
		SET ID_PAIs =:id, 
		NOMBRE =: nombre
		WHERE ID_PAIS = :id");

	$statement ->execute(array(
		':nombres'=>$id, 
		':nombre'=>$nombre, 
	
	));
	header('Location: paisCiudad.php');
}else{
	$id = id_numeros($_GET['ID_PAIS']);
	if(empty($id)){
		header('Location: paisCiudad.php');
	}
	$user = obtenerPais_id($conexion,$id);
	
	if(!$user){
		header('Location: paisCiudad.php');
	}
	$user =$user[0];
}

require 'vista/actualizarpais.php';
