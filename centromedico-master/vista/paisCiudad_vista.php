<?php
$mensaje='';
try{
	$conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
	echo "Error: ". $e->getMessage();
}

$consulta = $conexion -> prepare("
	SELECT * FROM PAIS limit 5");

$consulta ->execute();
$consulta = $consulta ->fetchAll();
if(!$consulta){
	$mensaje .= 'NO HAY PAISES PARA MOSTRAR';
}
?>
<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>Paises</h2>
					</div>
					<a class="agregar" href="registrapais.php">Agregar Pais</a>
						<table class="tabla">
						  <tr>
				       	<th>Codigo</th> 
							<th>Nombre</th>
                          </tr>
						<?php foreach ($consulta as $Sql): ?>
						<tr>
						<?php echo "<td>". $Sql['ID_PAIS']. "</td>"; ?>
                            <?php echo "<td>". $Sql['NOMBRE']. "</td>"; ?>
                            <?php echo "<td class='centrar'>"."<a href='actualizarpais.php?ID_PAIS=".$Sql['ID_PAIS']."' class='editar'>Editar</a>". "</td>"; ?>
						  <?php echo "<td class='centrar'>"."<a href='eliminar_usuario.php?ID_PAIS=".$Sql['ID_PAIS']."' class='eliminar'>Eliminar</a>". "</td>"; ?>
						</tr>
						<?php endforeach; ?>
					</table>
							<?php  if(!empty($mensaje)): ?>
							  <ul>
								  <?php echo $mensaje; ?>
							  </ul>
							<?php  endif; ?>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>