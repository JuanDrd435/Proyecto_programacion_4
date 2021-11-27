<?php include 'plantillas/header.php';

try{
    $conexion = new PDO('mysql:host=localhost;dbname=centromedico','root','');
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessge();
    die();
}
$resultado = $conexion->query("SELECT * FROM PAIS ");
$resultado = $resultado->fetchall();

       ?>
      
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>CIUADADES</h2>
					</div>
					<form class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="login">
                            <h2>REGISTRAR CIUDAD</h2><br/>
                            <select name="roll">
                                <?php
                                $resultado = $conexion->query("SELECT * FROM PAIS ");
                                $resultado = $resultado->fetchall();
                                      foreach ($resultado as $value){
                           echo "<option value=".$value['ID_PAIS'].">".$value['NOMBRE']."</option>";
                         }
                       
                                ?>
                               
                            </select>
                            <input type="text" name="codigo"placeholder="Codigo Ciudad" autofocus/>
                            <input type="text" name="nombre" placeholder="Nombre Ciudad" />
                           
                            <input type="submit" value="Registrar" />
                            <?php  if(!empty($errores)): ?>
                              <ul>
                                  <?php echo $errores; ?>
                              </ul>
                            <?php  endif; ?>
                          </form>	
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>