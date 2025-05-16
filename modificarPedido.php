<?php
include('conexionn.php');

// Verificar conexión
if (!$con) {
    die("conexión fallida: " . mysqli_connect_error());
}

// CSS para diseño
echo "<link rel='stylesheet' type='text/css' href='estilotablin.css'>";

// Mostrar la tabla de pedidos
$valor = mysqli_query($con, "SELECT * FROM PEDIDOS");

echo "<center><h1>Producto de los pedidos a Modificar</h1>"; 
echo "<table>";
echo "<tr style='background-color:#89ece6;'>
        <th>ID_PEDIDO</th>
        <th>ID_CLIENTE</th>
        <th>FECHA_PEDIDO</th>
        <th>TIPO_DE_ENTREGA</th>
        <th>TOTAL</th>
      </tr>";

while ($fila = mysqli_fetch_array($valor)) {
    echo "<tr>
            <td>{$fila['ID_PEDIDO']}</td>
            <td>{$fila['ID_CLIENTE']}</td>
            <td>{$fila['FECHA_PEDIDO']}</td>
            <td>{$fila['TIPO_DE_ENTREGA']}</td>
            <td>{$fila['TOTAL']}</td>
          </tr>";
}

echo "</table></center><br><br>";

// Formulario para modificar
echo "<center><h2>Modificar Inventario</h2></center>";
echo "<form method='POST' action=''>";
echo "<fieldset>";
echo "<label for='campo'>Campo a modificar:&nbsp;&nbsp;</label>";
echo "<select name='campo' id='campo' required>
        <option value='ID_PEDIDO'>ID del Detalle</option>
        <option value='ID_CLIENTE'>ID_CLIENTE</option>
        <option value='FECHA_PEDIDO'>FECHA_PEDIDO</option>
        <option value='TIPO_DE_ENTREGA'>TIPO_DE_ENTREGA</option>
        <option value='TOTAL'>TOTAL</option>
      </select>";
echo "<br><br>";

echo "<label for='valor'>Nuevo valor:&nbsp;&nbsp;</label>";
echo "<input type='text' name='valor' id='valor' required>";
echo "<br><br>";

echo "<label for='ID_PEDIDO_actual'>ID del pedido actual:&nbsp;&nbsp;</label>";
echo "<input type='text' name='ID_PEDIDO_actual' id='ID_PEDIDO_actual' required>";
echo "<br><br>";

echo "<input type='submit' value='Modificar' style='padding: 10px 20px ; background-color: pink; text-decoration: none; border-radius: 5px;'>&nbsp;&nbsp;";
echo "<a href='menuDetallePedido.html' style='padding: 10px 20px ; background-color: pink; text-decoration: none; border-radius: 5px;'>REGRESAR</a>";
echo "</fieldset>";
echo "</form>";

// Procesar la modificación
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];
    $ID_PEDIDO_actual = $_POST['ID_PEDIDO_actual'];

    $query = "UPDATE PEDIDOS SET $campo = '$valor' WHERE ID_PEDIDO = '$ID_PEDIDO_actual'";
    $resultado = mysqli_query($con, $query);

    if (mysqli_affected_rows($con) > 0) {
        echo "<center><p style='color: green;'>Pedido modificado con éxito.</p></center>";

        $clientes = mysqli_query($con, "SELECT * FROM PEDIDOS");
        echo "<center><h3>Lista de Pedidos Actualizada</h3></center>";
        echo "<center><table>";
        echo "<tr>
                <th>ID_PEDIDO</th>
                <th>ID_CLIENTE</th>
                <th>FECHA_PEDIDO</th>
                <th>TIPO_DE_ENTREGA</th>
                <th>TOTAL</th>
              </tr>";

        while ($fila = mysqli_fetch_array($clientes)) {
            echo "<tr>
                    <td>{$fila['ID_PEDIDO']}</td>
                    <td>{$fila['ID_CLIENTE']}</td>
                    <td>{$fila['FECHA_PEDIDO']}</td>
                    <td>{$fila['TIPO_DE_ENTREGA']}</td>
                    <td>{$fila['TOTAL']}</td>
                  </tr>";
        }

        echo "</table></center>";
        echo "<a href='menuPedido.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";
        echo "<link rel='stylesheet' type='text/css' href='estilooo.css'>";
    } else {
        echo "<center><p style='color: red;'>Error al modificar el cliente: " . mysqli_error($con) . "</p></center>";
    }
}

mysqli_close($con);
?>
