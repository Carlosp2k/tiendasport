<?php
include('conexionn.php');

// Verificar conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// CSS para diseño
echo "<link rel='stylesheet' type='text/css' href='estilotablin.css'>";
// ejemplo
$valor = mysqli_query($con, "SELECT * FROM DETALLE_PEDIDO");

echo "<center><h1>Detalle del Pedido a Modificar</h1>"; 
echo "<table>";
echo "<tr style='background-color:#89ece6;'><th>ID_PEDIDO</th>
        <th>ID_PRODUCTO</th>
        <th>CANTIDAD</th>
        <th>PRECIO_UNITARIO</th>
        <th>SUB_TOTAL</th>
      </tr>";

while ($fila = mysqli_fetch_array($valor)) {
    echo "<tr>
            <td>{$fila['ID_PEDIDO']}</td>
            <td>{$fila['ID_PRODUCTO']}</td>
            <td>{$fila['CANTIDAD']}</td>
            <td>{$fila['PRECIO_UNITARIO']}</td>
            <td>{$fila['SUB_TOTAL']}</td>
          </tr>";
}

echo "</table></center><br><br>";

// Mostrar formulario para modificar detalle de pedido
echo "<center><h2>Modificar Detalle del Pedido</h2></center>";
echo "<form method='POST' action=''>";
echo "<fieldset>";
echo "<label for='campo'>Campo a modificar:&nbsp;&nbsp;</label>";
echo "<select name='campo' id='campo' required>
        <option value='ID_PEDIDO'>ID_PEDIDO</option>
        <option value='ID_PRODUCTO'>ID_PRODUCTO</option>
        <option value='CANTIDAD'>CANTIDAD</option>
        <option value='PRECIO_UNITARIO'>PRECIO_UNITARIO</option>
        <option value='SUB_TOTAL'>SUB_TOTAL</option>
      </select>";

echo "<br><br>";

echo "<label for='valor'>Nuevo valor:&nbsp;&nbsp;</label>";
echo "<input type='text' name='valor' id='valor' required>";

echo "<br><br>";

echo "<label for='ID_DETALLE_actual'>ID del Detalle actual:&nbsp;&nbsp;</label>";
echo "<input type='text' name='ID_DETALLE_actual' id='ID_DETALLE_actual' required>";

echo "<br><br>";

echo "<input type='submit'  style='padding: 10px 20px ; background-color: pink; text-decoration: none; border-radius: 5px;' value='Modificar'>&nbsp;&nbsp;";
echo "<a href='menuDetallePedido.html' style='padding: 10px 20px ; background-color: pink; text-decoration: none; border-radius: 5px;'>REGRESAR</a>";
echo "</fieldset>";
echo "</form>";

// Procesar la solicitud POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];
    $ID_DETALLE_actual = $_POST['ID_DETALLE_actual'];

    // Consulta para modificar el detalle del pedido
    $query = "UPDATE DETALLE_PEDIDO SET $campo = '$valor' WHERE ID_DETALLE = '$ID_DETALLE_actual'";
    $resSULTADO= mysqli_query($con, $query);

    // Verificación de éxito o error en la consulta
    if (mysqli_affected_rows($con) > 0) {
        echo "<center><p style='color: green;'>Detalle modificado con éxito.</p></center>";

        // Mostrar la tabla solo si la modificación fue exitosa
        $clientes = mysqli_query($con, "SELECT * FROM DETALLE_PEDIDO");
        echo "<center><h3>Lista de Detalles Actualizada</h3></center>";
        echo "<center><table>";
        echo "<tr>
                <th>ID_DETALLE</th>
                <th>ID_PEDIDO</th>
                <th>ID_PRODUCTO</th>
                <th>CANTIDAD</th>
                <th>PRECIO_UNITARIO</th>
                <th>SUB_TOTAL</th>
              </tr>";

        while ($fila = mysqli_fetch_array($clientes)) {
            echo "<tr>
                    <td>{$fila['ID_DETALLE']}</td>
                    <td>{$fila['ID_PEDIDO']}</td>
                    <td>{$fila['ID_PRODUCTO']}</td>
                    <td>{$fila['CANTIDAD']}</td>
                    <td>{$fila['PRECIO_UNITARIO']}</td>
                    <td>{$fila['SUB_TOTAL']}</td>
                  </tr>";
        }

        echo "</table></center>";
        echo "<a href='menuDetallePedido.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";
    } else {
        echo "<center><p style='color: red;'>Error al modificar el detalle del pedido: " . mysqli_error($con) . "</p></center>";
    }
}

mysqli_close($con);
?>
