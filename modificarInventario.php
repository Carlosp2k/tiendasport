<?php
include('conexionn.php');

// Verificar conexión
if (!$con) {
    die("conexión fallida: " . mysqli_connect_error());
}

// CSS para diseño
echo "<link rel='stylesheet' type='text/css' href='estilotablin.css'>";

// Ejemplo de consulta
$valor = mysqli_query($con, "SELECT * FROM INVENTARIO");

echo "<center><h1>Producto del Inventario a Modificar</h1>"; 
echo "<table>";
echo "<tr style='background-color:#89ece6;'>
        <th>ID_MOVIMIENTO</th>
        <th>ID_PRODUCTO</th>
        <th>TIPO_MOVIMIENTO</th>
        <th>CANTIDAD</th>
        <th>FECHA</th>
        <th>DESCRIPCION</th>
        <th>ID_EMPLEADO</th>
      </tr>";

while ($fila = mysqli_fetch_array($valor)) {
    echo "<tr>
            <td>{$fila['ID_MOVIMIENTO']}</td>
            <td>{$fila['ID_PRODUCTO']}</td>
            <td>{$fila['TIPO_MOVIMIENTO']}</td>
            <td>{$fila['CANTIDAD']}</td>
            <td>{$fila['FECHA']}</td>
            <td>{$fila['DESCRIPCION']}</td>
            <td>{$fila['ID_EMPLEADO']}</td>
          </tr>";
}

echo "</table></center><br><br>";

// Mostrar formulario para modificar inventario
echo "<center><h2>Modificar Inventario</h2></center>";
echo "<form method='POST' action=''>";
echo "<fieldset>";
echo "<label for='campo'>Campo a modificar:&nbsp;&nbsp;</label>";
echo "<select name='campo' id='campo' required>
        <option value='ID_MOVIMIENTO'>ID del Movimiento</option>
        <option value='ID_PRODUCTO'>ID_PRODUCTO</option>
        <option value='TIPO_MOVIMIENTO'>TIPO_MOVIMIENTO</option>
        <option value='CANTIDAD'>CANTIDAD</option>
        <option value='FECHA'>FECHA</option>
        <option value='DESCRIPCION'>DESCRIPCION</option>
        <option value='ID_EMPLEADO'>ID_EMPLEADO</option>
      </select>";
echo "<br><br>";

echo "<label for='valor'>Nuevo valor:&nbsp;&nbsp;</label>";
echo "<input type='text' name='valor' id='valor' required>";
echo "<br><br>";

echo "<label for='ID_MOVIMIENTO_actual'>ID del Movimiento actual:&nbsp;&nbsp;</label>";
echo "<input type='text' name='ID_MOVIMIENTO_actual' id='ID_MOVIMIENTO_actual' required>";
echo "<br><br>";

echo "<input type='submit' value='Modificar' style='padding: 10px 20px; background-color: pink; text-decoration: none; border-radius: 5px;'>";
echo "<a href='menuInventario.html' style='padding: 10px 20px ; background-color: pink; text-decoration: none; border-radius: 5px;'>REGRESAR";
echo "</fieldset>";
echo "</form>";

// Procesar la solicitud POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];
    $ID_MOVIMIENTO_actual = $_POST['ID_MOVIMIENTO_actual'];

    // Usar sentencia preparada para evitar SQL Injection
    $query = "UPDATE INVENTARIO SET $campo = ? WHERE ID_MOVIMIENTO = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $valor, $ID_MOVIMIENTO_actual);
    mysqli_stmt_execute($stmt);

    // Verificación de éxito o error en la consulta
    if (mysqli_affected_rows($con) > 0) {
        echo "<center><p style='color: green;'>Producto modificado con éxito.</p></center>";
    } else {
        echo "<center><p style='color: red;'>Error al modificar el producto: " . mysqli_error($con) . "</p></center>";
    }
}

mysqli_close($con);
?>
