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
	$pais = limpiarDatos($_POST['pais']);
	
	$statement = $conexion->prepare(
		"UPDATE CIUDAD
		SET ID_CIUDAD =:id, 
		NOMBRE =:nombre, 
		ID_PAIS =:pais
		WHERE id = :id");

	$statement ->execute(array(
		':id'=>$id, 
		':nombre'=>$nombre, 
		':pais'=>$pais
		
	));
	header('Location: Ciudad.php');
}else{
	$id = id_numeros($_GET['id']);
	if(empty($id)){
		header('Location: usuarios.php');
	}
	$user = obtenerCiudad_id($conexion,$id);
	
	if(!$user){
		header('Location: Ciudad.php');
	}
	$user =$user[0];
}

require 'vista/actualizarciudad.php';
