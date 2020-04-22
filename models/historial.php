 <?php

    function mirar_historial($conn)
    {
        $sql = "select * from pedidos where dni='$_SESSION[dni]'";

        $resultado = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($resultado)) {
            $array1[] = $row;
        }

        $sql2 = "select detallepedido.cod_pedido,platos.nombre,detallepedido.cantidad,  platos.precio from detallepedido,platos where detallepedido.cod_plato=platos.cod_plato AND cod_pedido in (select cod_pedido from pedidos where dni='$_SESSION[dni]')";

        $resultado = mysqli_query($conn, $sql2);
        while ($row = mysqli_fetch_assoc($resultado)) {
            $array2[] = $row;
        }

        $final[0] = $array1;
        $final[1] = $array2;
        return $final;
    }

    ?>
 