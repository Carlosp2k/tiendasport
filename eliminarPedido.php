<?php
include("conexionn.php");

echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;'>";
echo "<tr style='background-color:#89ece6;'>
        <th>ID_PEDIDO</th>
        <th>ID_CLIENTE</th>
        <th>FECHA_PEDIDO</th>
        <th>TIPO_DE_ENTREGA</th>
        <th>TOTAL</th>
      </tr>";

$consultita = mysqli_query($con, "SELECT * FROM PEDIDOS");
while ($filaa = mysqli_fetch_array($consultita)) {
    echo "<tr>
            <td>{$filaa[0]}</td>
            <td>{$filaa[1]}</td>
            <td>{$filaa[2]}</td>
            <td>{$filaa[3]}</td>
            <td>{$filaa[4]}</td>
          </tr>";
}
echo "</table></center>";

echo "<br><br>";
echo "<link rel='stylesheet' type='text/css' href='estilooo.css'>";
echo "<link rel='stylesheet' type='text/css' href='estilotablin.css'>";
echo "<br><br>";

echo "<form method='POST' action=''>
        <fieldset style='width:50%'>
        <br>
        <h2>ID_PEDIDO A ELIMINAR:</h2>
        <input type='text' name='ELIMINARCLI'>
        <br><br>
        <input type='submit' value='Eliminar' class='custom-btn btn-9'>
        <br>
        </fieldset>
      </form>";

echo "<br>";
echo "<a href='menuPedido.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_eliminar = mysqli_real_escape_string($con, $_POST['ELIMINARCLI']);
    mysqli_query($con, "DELETE FROM PEDIDOS WHERE ID_PEDIDO='$id_eliminar'");

    echo "<h2>EL REGISTRO SE BORRÓ EXITOSAMENTE</h2>";

    echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;'>";
    echo "<tr style='background-color:#89ece6;'>
            <th>ID_PEDIDO</th>
            <th>ID_CLIENTE</th>
            <th>FECHA_PEDIDO</th>
            <th>TIPO_DE_ENTREGA</th>
            <th>TOTAL</th>
          </tr>";

    $consultita = mysqli_query($con, "SELECT * FROM PEDIDOS");
    while ($filaa = mysqli_fetch_array($consultita)) {
        echo "<tr>
                <td>{$filaa[0]}</td>
                <td>{$filaa[1]}</td>
                <td>{$filaa[2]}</td>
                <td>{$filaa[3]}</td>
                <td>{$filaa[4]}</td>
              </tr>";
    }
    echo "</table></center>";
    echo "<a href='menuPedido.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";
    echo "<link rel='stylesheet' type='text/css' href='estilooo.css'>";
}
?>
