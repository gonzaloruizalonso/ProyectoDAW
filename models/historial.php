 <?php

    function mirar_historial($conn)
    {
        $array = [];
        $sql = "SELECT * from pedidos where dni='$_SESSION[dni]'";
        $variable = mysqli_query($conn, $sql);
        $varibale2 = mysqli_fetch_assoc($variable);
        $array = $varibale2;
        return $array;
    }


    ?>
 