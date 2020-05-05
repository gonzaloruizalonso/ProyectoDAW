<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Greatfood</title>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="css.css" />
  <script type="text/javascript" src="js.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">GreatFood</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link " href="../controllers/platos.php" tabindex="-1">Platos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../controllers/contacto.php" tabindex="-1">Contacto</a>
        </li>
        <li class="nav-item ">
          <?php
          session_start();
          require_once("./db/db.php");
          $_SESSION['fallo'] = "no";

          if (isset($_SESSION['dni'])) {
          ?>
            <a class="nav-link " href="./controllers/area_personal.php" tabindex="-1">
              Area personal
            </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="./controllers/logout.php" tabindex="-1">
            Logout
          </a>
        </li>
      <?php

          } else {
            $past = time() - 3600;
            foreach ($_COOKIE as $key => $value) {
              if ($key != 'PHPSESSID') {
                setcookie($key, $value, $past, '/');
              }
            }
      ?>
        <a class="nav-link " href="./controllers/login.php" tabindex="-1">
          Login
        </a>
        </li>


      <?php
          }
      ?>

      </ul>
    </div>

  </nav>
  <div id="bienvenida" class="center block">

    <div class=" card">
      <div class="card-body ">
        <?php
        if (isset($_SESSION['dni'])) {
			//var_dump($_SESSION);
          echo "<h4 class=\"card-title\">Hola " . $_SESSION['nombre'] . "</h4>";
        } else {
          echo "<h4 class=\"card-title\">¡Bienvenido!</h4>";
        }

        ?>
        <p class="card-text ">Pide tus comidas a domicilio favoritas con GreatFood.</p><br>
        <a href="controllers/platos.php" class="btn btn-warning ">Conoce nuestra carta</a>
      </div>
      <div id="car" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#car" data-slide-to="0" class="active"></li>
          <li data-target="#car" data-slide-to="1"></li>
          <li data-target="#car" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/logo.png" class="d-block" width="100%" alt="logo">
            <div class="carousel-caption d-none d-md-block">
              <p>GreatFood</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/car1.jpg" class="d-block" width="100%" alt="">
          </div>
          <div class="carousel-item">
            <img src="img/car2.jpg" class="d-block" width="100%" alt="">
          </div>
        </div>
        <a class="carousel-control-prev" href="#car" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#car" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
      </div>
    </div>
  </div>

  <!--footer starts from here-->
  <footer class="footer">
    <div class="container">
 <hr>
      <!--foote_bottom_ul_amrc ends here-->
      <p class="text-center">Copyright @2020 | Diseñado por <a href="#">Greatfood</a></p>

      <ul class="social_footer_ul">
        <li><a href="http://facebook.com"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="http://twitter.com"><i class="fab fa-twitter"></i></a></li>
        <li><a href="http://youtube.com"><i class="fab fa-youtube"></i></a></li>
        <li><a href="http://instagram.com"><i class="fab fa-instagram"></i></a></li>
      </ul>
      <!--social_footer_ul ends here-->
    </div>

  </footer>

</body>

</html>