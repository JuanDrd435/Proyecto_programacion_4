 <?php include 'plantillas/header.php';
try{
    $conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessge();
    die();
} 

?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>CIUDAD</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <h2>EDITAR CIUDAD</h2><br/>
                        <input type="text" name="id" placeholder="Nombres" value="<?php echo $user['ID_PAIS'];?>"/>
                        <input type="text" name="nombre" placeholder="Apellidos" value="<?php echo $user['NOMBRE'];?>"/>
                        <select name="roll">
                            <?php
                            $resultado = $conexion->query("SELECT * FROM PAIS ");
                            $resultado = $resultado->fetchall();
                            foreach ($resultado as $value){
                                echo "<option value=".$value['ID_PAIS'].">".$value['NOMBRE']."</option>";   
                            }
                            ?>
                           
                        </select>

                        <input type="submit" value="Registrar" />
                        <?php  if(!empty($errores)): ?>
                          <ul>
                              <?php echo $errores; ?>
                          </ul>
                        <?php  endif; ?>
                     </form>
                    <a class="btn-regresar" href="Ciudad.php">Regresar</a>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>
</html>