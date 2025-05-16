<?php
include("conexionn.php");

if (
    isset($_POST['ID_MOVIMIENTO']) && !empty($_POST['ID_MOVIMIENTO']) &&
    isset($_POST['ID_PRODUCTO']) && !empty($_POST['ID_PRODUCTO']) &&
    isset($_POST['TIPO_MOVIMIENTO']) && !empty($_POST['TIPO_MOVIMIENTO']) &&
    isset($_POST['CANTIDAD']) && !empty($_POST['CANTIDAD']) &&
    isset($_POST['FECHA']) && !empty($_POST['FECHA']) &&
    isset($_POST['DESCRIPCION']) && !empty($_POST['DESCRIPCION']) &&
    isset($_POST['ID_EMPLEADO']) && !empty($_POST['ID_EMPLEADO'])
) {
    if ($con == true) {
        mysqli_query($con, "INSERT INTO INVENTARIO VALUES(
            '{$_POST['ID_MOVIMIENTO']}',
            '{$_POST['ID_PRODUCTO']}',
            '{$_POST['TIPO_MOVIMIENTO']}',
            '{$_POST['CANTIDAD']}',
            '{$_POST['FECHA']}',
            '{$_POST['DESCRIPCION']}',
            '{$_POST['ID_EMPLEADO']}')");

        echo "EL REGISTRO SE AGREGÓ CORRECTAMENTE";
        echo "<br><br>";

        echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;' border='1'>";
        echo "<tr style='background-color:#e9a98a;'>
                <th>ID_MOVIMIENTO</th>
                <th>ID_PRODUCTO</th>
                <th>TIPO_MOVIMIENTO</th>
                <th>CANTIDAD</th>
                <th>FECHA</th>
                <th>DESCRIPCION</th>
                <th>ID_EMPLEADO</th>
              </tr>";

        $consultitaa = mysqli_query($con, "SELECT * FROM INVENTARIO");
        while ($filaaa = mysqli_fetch_array($consultitaa)) {
            echo "<tr>
                    <td>{$filaaa[0]}</td>
                    <td>{$filaaa[1]}</td>
                    <td>{$filaaa[2]}</td>
                    <td>{$filaaa[3]}</td>
                    <td>{$filaaa[4]}</td>
                    <td>{$filaaa[5]}</td>
                    <td>{$filaaa[6]}</td>
                  </tr>";
        }
        echo "</table></center>";
        echo "<br><br>";
        echo "<a href='menuInventario.html'><button>REGRESAR AL MENÚ</button></a>";
    } else {
        echo "LO SIENTO. NO SE PUDO AGREGAR EL REGISTRO";
    }
} else {
    echo "NO SE CAPTURARON TODOS LOS DATOS. VERIFÍCALOS DE NUEVO";
}
?>
