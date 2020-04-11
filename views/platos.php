<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Greatfood</title>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css.css" />
    <script type="text/javascript" src="../js.js"></script>
    <script type="text/javascript">
        var peticion2;

        iniciar();

        function iniciar() {
            if (window.XMLHttpRequest) { // Mozilla, Safari, ...
                peticion2 = new XMLHttpRequest();
            } else if (window.ActiveXObject) { // IE
                peticion2 = new ActiveXObject("Microsoft.XMLHTTP");
            }

            if (document.addEventListener) {
                peticion2.addEventListener("readystatechange", carga);
            } else if (document.attachEvent) {
                peticion2.attachEvent("onreadystatechange", carga);
            }

            peticion2.open("GET", "../controllers/getDatosCarrito.php", true);

            peticion2.setRequestHeader("Content-Type","application/json");

            peticion2.send(null);


        }

        function carga() {
            if (peticion2.readyState == 4) {
                if (peticion2.status == 200) {
                    //console.log(peticion2.response);
                    var JSONPlatos=JSON.parse(peticion2.responseText);
                    console.log(JSONPlatos);
                    var cookies = document.cookie.split(";");
                    if (cookies.length > 1) {
                        $("#divcarrito").show("slow");

                        //--------------

                        var cookies = document.cookie.split(";");
                        //alert(cookies.length);
                        for (var i = 0; i < cookies.length; i++) {
                            var cookie = cookies[i];
                            var eqPos = cookie.indexOf("=");
                            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
                            if (String(name) != "PHPSESSID") {
                                var idAux = String(name);
                                for (var clave in JSONPlatos.platos) {
                                    if (JSONPlatos.platos.hasOwnProperty(clave)) {
                                        var a = parseInt(JSONPlatos.platos[clave].codplato);
                                        var b = parseInt(idAux);
                                        if (a == b) {
                                            $("#rowcarrito").after('<p>Nombre=' + JSONPlatos.platos[clave].nombre + " Precio=" + JSONPlatos.platos[clave].precio + ' Cantidad=' + getCookie(idAux) + '</p>');
                                        }
                                    }
                                }

                            }

                        }

                        //--------------                                                

                    }


                }
            }
        }
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">GreatFood</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link " href="#" tabindex="-1">Platos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../controllers/contacto.php" tabindex="-1">Contacto</a>
                </li>
                <li class="nav-item ">
                    <?php
                    //session_start();
                    require_once("../db/db.php");
                    if (isset($_SESSION['dni'])) {
                    ?>
                        <a class="nav-link " href="../controllers/area_personal.php" tabindex="-1">
                            Area personal
                        </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="../controllers/logout.php" tabindex="-1">
                        Logout
                    </a>
                </li>
            <?php

                    } else {
            ?>
                <a class="nav-link " href="../controllers/login.php" tabindex="-1">
                    Login
                </a>
                </li>


            <?php
                    }
            ?>
            </ul>
        </div>
    </nav>
    <?php

    if (empty($_SESSION['dni'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Necesario <strong><a href="../controllers/login.php">iniciar sesion/registrarse</strong></a> Para añadir platos al carrito.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    }

    ?>
    <div id="divcarrito" style="display: none">

        <div class="card">
            <div class="card-body ">
                <h4 class="card-title">Carrito</h4>
                <hr>
                <div class="container">
                    <div class="row" id="rowcarrito">
                        <script type="text/javascript">

                        </script>
                    </div>
                    <button class="btn btn-warning" onclick="deleteAllCookies()">Borrar carrito</button>

                    <form action="../controllers/formulario_carrito.php">
                        <button class="btn btn-warning"> Procesar carrito</button> </form>
                </div>
            </div>
        </div>
    </div>
    <div id="bienvenida">

        <div class="card">
            <div class="card-body ">
                <h4 class="card-title">Platos</h4>

                <hr>
                <?php


                ?>


                <div class="container">

                    <div class="row">


                        <?php

                        for ($i = 0; $i < sizeof($_SESSION["platos"]); $i++) {

                        ?>

                            <div class="card-deck col-12 col-md-6 col-lg-4 ">
                                <div class="card-body">
                                    <div class="card">
                                        <img height="200px" class='card-img-top' src="../img/<?php echo $_SESSION['platos'][$i]['cod_plato'] ?>.jpg">
                                        <?php
                                        echo "<div class='card-header bg-info'> <h5>" . $_SESSION["platos"][$i]["nombre"] . "</h5></div>";

                                        //echo $_SESSION['platos'][$i]['descripcion'];
                                        ?>

                                        <div class="card-footer bg-info"><?php echo "Precio: " . $_SESSION["platos"][$i]["precio"] . "€"; ?></div>

                                        <?php
                                        if (!empty($_SESSION['dni'])) {
                                        ?>
                                            <input type="submit" name="<?php echo $_SESSION['platos'][$i]['nombre'] ?>" value="Añadir" class="btn btn-warning " onclick="on<?php echo $_SESSION['platos'][$i]['cod_plato'] ?>()" id="<?php echo $_SESSION['platos'][$i]['cod_plato'] ?>" />

                                            <script type="text/javascript">
                                                function on<?php echo $_SESSION['platos'][$i]['cod_plato'] ?>() {
                                                    var plato = $("#<?php echo $_SESSION['platos'][$i]['cod_plato'] ?>").attr("name");
                                                    if (getCookie(<?php echo $_SESSION['platos'][$i]['cod_plato'] ?>) != null) {
                                                        setCookie(<?php echo $_SESSION['platos'][$i]['cod_plato'] ?>, parseInt(getCookie(<?php echo $_SESSION['platos'][$i]['cod_plato'] ?>)) + 1, 2);
                                                    } else {

                                                        setCookie(<?php echo $_SESSION['platos'][$i]['cod_plato'] ?>, 1, 2);
                                                    }
                                                    //alert(<?php echo $_SESSION['platos'][$i]['cod_plato'] ?>);
                                                    location.reload();
                                                }
                                            </script>
                                        <?php
                                        }
                                        ?>


                                    </div>
                                </div>

                            </div>
                        <?php
                        }

                        ?>
                    </div>




                </div>



                </form>
            </div>
        </div>

    </div>

</body>

</html>