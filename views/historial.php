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
    <link rel="stylesheet" href="../css.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script type="text/javascript" src="../js.js"></script>
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
                    <a class="nav-link " href="../controllers/platos.php" tabindex="-1">Platos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="contacto.php" tabindex="-1">Contacto</a>
                </li>
                <li class="nav-item ">
                    <?php
                    //session_start();
                    //require_once("../db/db.php");
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
    <div id="bienvenida">

        <div class="card">
            <div class="card-body ">
                <h4 class="card-title">Historial</h4>
                <p class="card-text ">Consulte sus pedidos</p>
                <?php

                ?>
                <table class="table table-dark table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Numero de pedido</th>
                            <th scope="col">Fecha Pedido</th>
                            <th scope="col">Fecha de Entrega</th>
                            <th scope="col">Precio total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        //Aqui debajo irian el historial
                        //var_dump($array);

                        for ($i = 0; $i < sizeof($_SESSION["array1"]); $i++) {
                            echo "<script>console.log(" . $_SESSION["array1"][$i]["cod_pedido"] . ")</script>";
                            echo "<tr>
                            <th class='bg-primary' scope='row'>" . $_SESSION["array1"][$i]["cod_pedido"] . "</th>
                            <td class='bg-primary'>" . $_SESSION["array1"][$i]["fecha_pedido"] . "</td>
                            <td class='bg-primary'>" . $_SESSION["array1"][$i]["fecha_entrega"] . "</td>
                            <td class='bg-primary'>" . $_SESSION["array1"][$i]["precio_total"] . "</td>
                        </tr>
                          
                        <tr>
                            <th class='bg-info' scope='col'>#</th>
                            <th class='bg-secondary' scope='col'>Nombre</th>
                            <th class='bg-secondary' scope='col'>Cantidad</th>
                            <th class='bg-secondary' scope='col'>Precio</th>
                            
                        </tr>";
                            for ($j = 0; $j < sizeof($_SESSION["array2"]); $j++) {
                                if ($_SESSION["array2"][$j]["cod_pedido"] == $_SESSION["array1"][$i]["cod_pedido"]) {

                                    echo "<tr>
                                <th class='bg-info' scope='row'>#</th>
                                <td class='bg-info'>" . $_SESSION["array2"][$j]["nombre"] . "</td>
                                <td class='bg-info'>" . $_SESSION["array2"][$j]["cantidad"] . "</td>
                                <td class='bg-info'>" . $_SESSION["array2"][$j]["precio"] . "</td>
                                </tr>";
                                }
                            }
                        }

                        ?>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

</body>

</html>