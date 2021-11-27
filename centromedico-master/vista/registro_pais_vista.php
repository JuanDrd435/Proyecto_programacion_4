<?php include 'plantillas/header.php'; ?>
	<section class="main">
		<div class="wrapp">
			<?php include 'plantillas/nav.php'; ?>
				<article>
					<div class="mensaje">
						<h2>PAISES</h2>
					</div>
					<form class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="login">
                            <h2>REGISTRAR PAISES</h2><br/>
                            <input type="text" name="codigo"placeholder="Codigo Pais" autofocus/>
                            <input type="text" name="nombre" placeholder="Nombre Pais" />
                           
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