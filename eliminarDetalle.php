<?php
include("conexionn.php");

// Mostrar tabla de detalles de pedido
echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;'>";
echo "<tr style='background-color:#89ece6;'><th>ID_DETALLE</th>";
echo "<th>ID_PEDIDO</th>";
echo "<th>ID_PRODUCTO</th>";
echo "<th>CANTIDAD</th>";
echo "<th>PRECIO_UNITARIO</th>";
echo "<th>SUBTOTAL</th></tr>";

$consultita = mysqli_query($con, "SELECT * FROM DETALLE_PEDIDO");
while ($filaa = mysqli_fetch_array($consultita)) {
    echo "<tr>
            <td>$filaa[0]</td>
            <td>$filaa[1]</td>
            <td>$filaa[2]</td>
            <td>$filaa[3]</td>
            <td>$filaa[4]</td>
            <td>$filaa[5]</td>
          </tr>";
}
echo "</table></center><br><br>";

// Formulario para eliminar un registro
echo "<link rel='stylesheet' type='text/css' href='estilooo.css'>";
echo "<link rel='stylesheet' type='text/css' href='estilotablin.css'>";
echo "<form method='POST' action=''>";
echo "<fieldset style='width:50%'>";
echo "<br>";
echo "<h2>ID_DETALLE A ELIMINAR:</h2>";
echo "<input type='text' name='ELIMINARCLI'>";
echo "<br><br>";
echo "<input type='submit' value='Eliminar' class='custom-btn btn-9'>";
echo "<br></fieldset></form><br>";

// Enlace para regresar
echo "<a href='menuDetallePedido.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";

// Si el formulario fue enviado, eliminar el registro
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ELIMINARCLI']) && !empty($_POST['ELIMINARCLI'])) {
    $id_detalle = mysqli_real_escape_string($con, $_POST['ELIMINARCLI']);
    $eliminar = mysqli_query($con, "DELETE FROM DETALLE_PEDIDO WHERE ID_DETALLE='$id_detalle'");
    
    if ($eliminar) {
        echo "<H2>EL REGISTRO SE BORRÓ EXITOSAMENTE</H2>";
        echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;'>";
        echo "<tr style='background-color:#89ece6;'><th>ID_DETALLE</th>";
        echo "<th>ID_PEDIDO</th>";
        echo "<th>ID_PRODUCTO</th>";
        echo "<th>CANTIDAD</th>";
        echo "<th>PRECIO_UNITARIO</th>";
        echo "<th>SUBTOTAL</th></tr>";

        $consultita = mysqli_query($con, "SELECT * FROM DETALLE_PEDIDO");
        while ($filaa = mysqli_fetch_array($consultita)) {
            echo "<tr>
                    <td>$filaa[0]</td>
                    <td>$filaa[1]</td>
                    <td>$filaa[2]</td>
                    <td>$filaa[3]</td>
                    <td>$filaa[4]</td>
                    <td>$filaa[5]</td>
                  </tr>";
        }
        echo "</table></center><br>";
        echo "<a href='menuDetallePedido.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";
    } else {
        echo "<H2>ERROR AL BORRAR EL REGISTRO</H2>";
    }
} else {
    echo "<H2>NO SE HA SELECCIONADO NINGÚN ID</H2>";
}
?>
