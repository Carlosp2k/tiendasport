<?php
include("conexionn.php");

// Mostrar tabla de clientes
echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;'>";
echo "<tr style='background-color:#89ece6;'>
        <th>ID_CLIENTE</th>
        <th>NOMBRE</th>
        <th>CORREO</th>
        <th>TELEFONO</th>
        <th>DIRECCION_ENVIO</th>
        <th>FECHA_REGISTRO</th>
      </tr>";

$consulta = mysqli_query($con, "SELECT * FROM CLIENTE");

while ($filaa = mysqli_fetch_array($consulta)) {
    echo "<tr>
            <td>$filaa[0]</td>
            <td>$filaa[1]</td>
            <td>$filaa[2]</td>
            <td>$filaa[3]</td>
            <td>$filaa[4]</td>
            <td>$filaa[5]</td>
          </tr>";
}

echo "</table></center>";

echo "<br><br>";

// Formulario para eliminar un cliente
echo "<form method='POST' action='eliminarCliente.php'>";
echo "<fieldset style='width:50%;'>";
echo "<br>";
echo "<h2>ID_CLIENTE A ELIMINAR:</h2>";
echo "<input type='text' name='ELIMINARCLI'>";
echo "<br><br>";
echo "<input type='submit' value='Eliminar' class='custom-btn btn-9'>";
echo "<br></fieldset></form>";

echo "<br>";
echo "<a href='menuCliente.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";

// Verificar si el formulario fue enviado y realizar la eliminación
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ELIMINARCLI'])) {
    // Escapar datos para evitar inyección SQL
    $id_cliente = mysqli_real_escape_string($con, $_POST['ELIMINARCLI']);
    
    // Eliminar el cliente con el ID proporcionado
    $delete_query = "DELETE FROM CLIENTE WHERE ID_CLIENTE = '$id_cliente'";
    if (mysqli_query($con, $delete_query)) {
        echo "<h2>EL REGISTRO SE BORRÓ EXITOSAMENTE</h2>";
    } else {
        echo "<h2>Error al eliminar el registro</h2>";
    }

    // Actualizar la tabla después de la eliminación
    echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;'>";
    echo "<tr style='background-color:#89ece6;'>
            <th>ID_CLIENTE</th>
            <th>NOMBRE</th>
            <th>CORREO</th>
            <th>TELEFONO</th>
            <th>DIRECCION_ENVIO</th>
            <th>FECHA_REGISTRO</th>
          </tr>";

    $consultita = mysqli_query($con, "SELECT * FROM CLIENTE");
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

    echo "</table></center>";
    echo "<a href='menuClientes.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";
}
?>
