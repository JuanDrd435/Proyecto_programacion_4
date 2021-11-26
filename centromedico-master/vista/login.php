<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=decive-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
    <title>Iniciar - Ciudadano Sano</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/x-svg" href="img/Logo-1-copia.svg" >
</head>
<body>
	<form class="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" name="login">
        <h2>Iniciar Sesion</h2>
        <img src="img/Logo 1.png" style="width:300px;height:300px;border-radius:250px;">
        <input type="text" name="usuario"placeholder="Usuario" class="bordes" autofocus/>
        <input type="password" name="password" placeholder="Contraseña" class="bordes"/>
        <input type="submit" value="Ingresar"></input>
        <?php  if(!empty($errores)): ?>
          <ul>
              <?php echo $errores; ?>
          </ul>
        <?php  endif; ?>
      </form>
</body>
</html>