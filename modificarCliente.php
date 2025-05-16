<?php
include('conexionn.php');

// Verificar conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

echo "<link rel='stylesheet' type='text/css' href='estilotablin.css'>";

// Obtener datos
$valor = mysqli_query($con, "SELECT * FROM CLIENTE");

echo "<center><h1>Cliente a Modificar</h1>"; 
echo "<table border='1'>";
echo "<tr style='background-color:#89ece6;'>
        <th>ID_CLIENTE</th>
        <th>NOMBRE</th>
        <th>CORREO</th>
        <th>CONTRA</th>
        <th>TELEFONO</th>
        <th>DIRECCION_ENVIO</th>
        <th>FECHA_REGISTRO</th>
      </tr>";

while ($fila = mysqli_fetch_array($valor, MYSQLI_ASSOC)) {
    echo "<tr>
            <td>{$fila['ID_CLIENTE']}</td>
            <td>{$fila['NOMBRE']}</td>
            <td>{$fila['CORREO']}</td>
            <td>{$fila['CONTRA']}</td>
            <td>{$fila['TELEFONO']}</td>
            <td>{$fila['DIRECCION_ENVIO']}</td>
            <td>{$fila['FECHA_REGISTRO']}</td>
          </tr>";
}

echo "</table></center><br><br>";

// Formulario
echo "<center><h2>Modificar Cliente</h2></center>";
echo "<form method='POST' action=''>";
echo "<fieldset>";
echo "<label for='campo'>Campo a modificar:&nbsp;&nbsp;</label>";
echo "<select name='campo' id='campo' required>
        <option value='NOMBRE'>Nombre</option>
        <option value='CORREO'>Correo</option>
        <option value='CONTRA'>Contra</option>
        <option value='TELEFONO'>Telefono</option>
        <option value='DIRECCION_ENVIO'>Dirección de Envío</option>
        <option value='FECHA_REGISTRO'>Fecha Registro</option>
      </select>";

echo "<br><br>";
echo "<label for='valor'>Nuevo valor:&nbsp;&nbsp;</label>";
echo "<input type='text' name='valor' id='valor' required>";

echo "<br><br>";
echo "<label for='id_cliente_actual'>ID del Cliente actual:&nbsp;&nbsp;</label>";
echo "<input type='text' name='id_cliente_actual' id='id_cliente_actual' required>";

echo "<br><br>";
echo "<input type='submit' value='Modificar' style='padding: 10px 20px; background-color: pink; border-radius: 5px;'>";
echo "&nbsp;&nbsp;<a href='menuClienteS.html' style='padding: 10px 20px; background-color: pink; text-decoration: none; border-radius: 5px;'>REGRESAR</a>";
echo "</fieldset>";
echo "</form>";

// Procesar modificación
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];
    $id_cliente_actual = $_POST['id_cliente_actual'];

    $query = "UPDATE CLIENTE SET $campo = '$valor' WHERE ID_CLIENTE = '$id_cliente_actual'";
    $resultado = mysqli_query($con, $query);

    if (mysqli_affected_rows($con) > 0) {
        echo "<center><p style='color: green;'>Cliente modificado con éxito.</p></center>";

        // Mostrar tabla actualizada
        $clientes = mysqli_query($con, "SELECT * FROM CLIENTE");
        echo "<center><h3>Lista de Clientes Actualizada</h3></center>";
        echo "<center><table border='1'>";
        echo "<tr>
                <th>ID_CLIENTE</th>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>CONTRA</th>
                <th>TELEFONO</th>
                <th>DIRECCION_ENVIO</th>
                <th>FECHA_REGISTRO</th>
              </tr>";

        while ($fila = mysqli_fetch_array($clientes, MYSQLI_ASSOC)) {
            echo "<tr>
                    <td>{$fila['ID_CLIENTE']}</td>
                    <td>{$fila['NOMBRE']}</td>
                    <td>{$fila['CORREO']}</td>
                    <td>{$fila['CONTRA']}</td>
                    <td>{$fila['TELEFONO']}</td>
                    <td>{$fila['DIRECCION_ENVIO']}</td>
                    <td>{$fila['FECHA_REGISTRO']}</td>
                  </tr>";
        }

        echo "</table></center>";
        echo "<link rel='stylesheet' type='text/css' href='estilooo.css'>";
        echo "<center><a href='menuClienteS.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a></center>";
    } else {
        echo "<center><p style='color: red;'>Error al modificar el cliente: " . mysqli_error($con) . "</p></center>";
    }
}

mysqli_close($con);
?>
    