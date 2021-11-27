<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>PAIS</h2>
					</div>
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                        <h2>EDITAR PAIS</h2><br/>
                        <input type="text" name="id" placeholder="Nombres" value="<?php echo $user['ID_PAIS'];?>"/>
                        <input type="text" name="nombre" placeholder="Apellidos" value="<?php echo $user['NOMBRE'];?>"/>
                        <select name="roll">
                            <option value="admin">Admin</option>
                            <option value="Limitado">Limitado</option>
                        </select>

                        <input type="submit" value="Registrar" />
                        <?php  if(!empty($errores)): ?>
                          <ul>
                              <?php echo $errores; ?>
                          </ul>
                        <?php  endif; ?>
                     </form>
                    <a class="btn-regresar" href="paisCiudad.php">Regresar</a>
				</article>
	</section>
<?php include 'plantillas/footer.php'; ?>
</body>
</html>
</html>