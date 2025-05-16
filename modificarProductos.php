<?php
include('conexionn.php');

// Verificar conexión
if (!$con) 
{
    die("conexión fallida: " . mysqli_connect_error());
}

// CSS para diseño
echo "<link rel='stylesheet' type='text/css' href='estilotablin.css'>";
//ejemploo
$valor = mysqli_query($con, "SELECT * FROM PRODUCTO");

echo "<center><h1>Productos a Modificar</h1>"; 
echo "<table>";
echo "<tr>
        <tr style='background-color:#89ece6;'><th>ID_PRODUCTO</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>CATEGORIA</th>
        <th>STOCK_ACTUAL</th>
      </tr>";

while ($fila = mysqli_fetch_array($valor)) 
{
    echo "<tr>
            <td>{$fila['ID_PRODUCTO']}</td>
            <td>{$fila['NOMBRE']}</td>
            <td>{$fila['DESCRIPCION']}</td>
            <td>{$fila['PRECIO']}</td>
            <td>{$fila['CATEGORIA']}</td>
            <td>{$fila['STOCK_ACTUAL']}</td>
          </tr>";
}

echo "</table></center><br><br>";


//termina ejemplo

// Mostrar formulario para modificar cliente
echo "<center><h2>Modificar Producto</h2></center>";
echo "<form method='POST' action=''>";
echo "<fieldset>";
echo "<label for='campo'>Campo a modificar:&nbsp;&nbsp;</label>";
echo "<select name='campo' id='campo' required>
        <option value='ID_PRODUCTO'>ID del Producto</option>
        <option value='NOMBRE'>NOMBRE</option>
        <option value='DESCRIPCION'>DESCRIPCION</option>
        <option value='PRECIO'>PRECIO</option>
        <option value='CATEGORIA'>CATEGORIA</option>
        <option value='STOCK_ACTUAL'>STOCK_ACTUAL</option>
      </select>";

echo "<br><br>";

echo "<label for='valor'>Nuevo valor:&nbsp;&nbsp;</label>";
echo "<input type='text' name='valor' id='valor' required>";

echo "<br><br>";

echo "<label for='ID_PRODUCTO_actual'>ID del Producto actual:&nbsp;&nbsp;</label>";
echo "<input type='text' name='ID_PRODUCTO_actual' id='ID_PRODUCTO_actual' required>";

echo "<br><br>";

echo "<input type='submit'  style='padding: 10px 20px ; background-color: pink; text-decoration: none; 
        border-radius: 5px;value='Modificar'>&nbsp;&nbsp;";
echo "<a href='menuProductos.html' style='padding: 10px 20px ; background-color: pink; text-decoration: none; 
        border-radius: 5px;'>REGRESAR";
echo "</fieldset>";
echo "</form>";

// Procesar la solicitud POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];
    $ID_PRODUCTO_actual = $_POST['ID_PRODUCTO_actual'];

    // Consulta para modificar el cliente
    $query = "UPDATE PRODUCTO SET $campo = '$valor' WHERE ID_PRODUCTO = '$ID_PRODUCTO_actual'";
    $resultado = mysqli_query($con, $query);

    // Verificación de éxito o error en la consulta
    if (mysqli_affected_rows($con) > 0) {
        echo "<center><p style='color: green;'>Producto modificado con éxito.</p></center>";

        // Mostrar la tabla solo si la modificación fue exitosa
        $clientes = mysqli_query($con, "SELECT * FROM PRODUCTOS");
        echo "<center><h3>Lista de Clientes Actualizada</h3></center>";
        echo "<center><table>";
        echo "<tr>
                <th>ID_PRODUCTO</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>PRECIO</th>
                <th>CATEGORIAS</th>
                <th>ID_USUARIO</th>
              </tr>";

        while ($fila = mysqli_fetch_array($clientes)) {
            echo "<tr>
                    <td>{$fila['ID_PRODUCTO']}</td>
                    <td>{$fila['NOMBRE']}</td>
                    <td>{$fila['DESCRIPCION']}</td>
                    <td>{$fila['PRECIO']}</td>
                    <td>{$fila['CATEGORIAS']}</td>
                    <td>{$fila['STOCK_ACTUAL']}</td>
                  </tr>";
        }

        echo "</table></center>";
        echo "<a href='menuProductos.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button><a>";
		echo "<link rel='stylesheet' type='text/css' href='estilooo.css'>";

    } else {
        echo "<center><p style='color: red;'>Error al modificar el cliente: " . mysqli_error($con) . "</p></center>";
    }
}

mysqli_close($con);
?>
