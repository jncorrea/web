<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../estilos/style-login.css"> 
  </head>

  <body>

    <div class="wrapper">
	<div class="container">
		<h1>Login</h1>
		
		<form class="form" action="validar_usuario.php" method="post">
			<input type="text" name="admin" required="required" placeholder="Username">
			<input type="password" name="password_usuario" required="required"placeholder="Password">
			<button type="submit" name="iniciar" id="login-button">Login</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="bootstrap/js/index.js"></script>    
  </body>
</html>
