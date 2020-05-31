


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Greatfood</title>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css.css"/>
    <script type="text/javascript" src="../js.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="../index.php">GreatFood</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a
              class="nav-link "
              href="../controllers/platos.php"
              tabindex="-1"
              
              >Platos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="contacto.php" tabindex="-1" >Contacto</a
            >
          </li>
          <li class="nav-item ">
            <?php
			  session_start();
			  require_once("../db/db.php");
			  ?>
				<a class="nav-link " href="./login.php" tabindex="-1">
					Login
				</a>
      			</li>
			

        </ul>
      </div>
    </nav>
    	    <?php 
	if (isset($_SESSION['fallo'])) {
		if ($_SESSION['fallo']=="login") {
			?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Datos incorrectos</strong> Prueba otra vez.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php
		}
	}
 ?>
    <div id="bienvenida">
    	
	<div class="card">
	<div class="card-body ">
	<h4 class="card-title">Login</h4>
	<p class="card-text " >Accede a tu área personal</p>
	

	<form action="main.php" method="POST">
    <hr>
		<div class="form-group" id="login">
		<p>DNI:<input type="text" name="dni" class="form-control" pattern="[0-9]{8}[A-Za-z]{1}" required/></p>
		<p>Contraseña:<input type="password" name="password" class="form-control" required/></p><br />
   
		<input type="submit" value="Login" class="btn btn-warning "/>
    
		</div>
	</form>
  <hr>
      <p class="card-text" style="display: inline;">¿Aún no estás registrado?</p>
      <a class="text-primary" href="registro.php" style="display: inline;">Regístrate</a>
	</div>
	</div>

    </div>

  </body>
</html>
