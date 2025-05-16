<?php
include("conexionn.php");

if (
    isset($_POST['ID_DETALLE']) && !empty($_POST['ID_DETALLE']) &&
    isset($_POST['ID_PEDIDO']) && !empty($_POST['ID_PEDIDO']) &&
    isset($_POST['ID_PRODUCTO']) && !empty($_POST['ID_PRODUCTO']) &&
    isset($_POST['CANTIDAD']) && !empty($_POST['CANTIDAD']) &&
    isset($_POST['PRECIO_UNITARIO']) && !empty($_POST['PRECIO_UNITARIO']) &&
    isset($_POST['SUBTOTAL']) && !empty($_POST['SUBTOTAL'])
) {
    if ($con == true) {
        mysqli_query($con, "INSERT INTO DETALLE_PEDIDO VALUES
        (
            '{$_POST['ID_DETALLE']}',
            '{$_POST['ID_PEDIDO']}',
            '{$_POST['ID_PRODUCTO']}',
            '{$_POST['CANTIDAD']}',
            '{$_POST['PRECIO_UNITARIO']}',
            '{$_POST['SUBTOTAL']}'
        )");

        echo "EL REGISTRO SE AGREGÓ CORRECTAMENTE<br><br>";

        echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;'>";
        echo "<tr style='background-color:#e9a98a;'>
                <th>ID_DETALLE</th>
                <th>ID_PEDIDO</th>
                <th>ID_PRODUCTO</th>
                <th>CANTIDAD</th>
                <th>PRECIO_UNITARIO</th>
                <th>SUBTOTAL</th>
              </tr>";

        $consultitaa = mysqli_query($con, "SELECT * FROM DETALLE_PEDIDO");
        while ($filaaa = mysqli_fetch_array($consultitaa)) {
            echo "<tr>
                    <td>{$filaaa[0]}</td>
                    <td>{$filaaa[1]}</td>
                    <td>{$filaaa[2]}</td>
                    <td>{$filaaa[3]}</td>
                    <td>{$filaaa[4]}</td>
                    <td>{$filaaa[5]}</td>
                  </tr>";
        }

        echo "</table></center><br><br>";
        echo "<a href='menuDetallePedido.html'><button>REGRESAR AL MENÚ</button></a>";
    } else {
        echo "LO SIENTO. NO SE PUDO AGREGAR EL REGISTRO";
    }
} else {
    echo "NO SE CAPTURARON TODOS LOS DATOS. VERIFÍCALOS DE NUEVO";
}
?>
