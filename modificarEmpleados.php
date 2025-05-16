<?php
include('conexionn.php');

// Verificar conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// CSS para diseño
echo "<link rel='stylesheet' type='text/css' href='estilotablin.css'>";

// Mostrar tabla de empleados
$valor = mysqli_query($con, "SELECT * FROM EMPLEADOS");

echo "<center><h1>EMPLEADOS a Modificar</h1>"; 
echo "<table>";
echo "<tr style='background-color:#89ece6;'>
        <th>ID_EMPLEADO</th>
        <th>NOMBRE</th>
        <th>USUARIO</th>
        <th>CONTRA</th>
        <th>EDAD</th>
        <th>CARGO</th>
        <th>NIVEL_ACCESO</th>
      </tr>";

while ($fila = mysqli_fetch_array($valor)) {
    echo "<tr>
            <td>{$fila['ID_EMPLEADO']}</td>
            <td>{$fila['NOMBRE']}</td>
            <td>{$fila['USUARIO']}</td>
            <td>{$fila['CONTRA']}</td>
            <td>{$fila['EDAD']}</td>
            <td>{$fila['CARGO']}</td>
            <td>{$fila['NIVEL_ACCESO']}</td>
          </tr>";
}

echo "</table></center><br><br>";

// Mostrar formulario para modificar empleados
echo "<center><h2>Modificar EMPLEADO</h2></center>";
echo "<form method='POST'>";
echo "<fieldset>";
echo "<label for='campo'>Campo a modificar:&nbsp;&nbsp;</label>";
echo "<select name='campo' id='campo' required>
<option value='ID_EMPLEADO'>ID_EMPLEADO</option>
        <option value='NOMBRE'>Nombre</option>
        <option value='USUARIO'>Usuario</option>
        <option value='CONTRA'>Contraseña</option>
        <option value='EDAD'>Edad</option>
        <option value='CARGO'>Cargo</option>
        <option value='NIVEL_ACCESO'>Nivel de acceso</option>
      </select><br><br>";

echo "<label for='valor'>Nuevo valor:&nbsp;&nbsp;</label>";
echo "<input type='text' name='valor' id='valor' required><br><br>";

echo "<label for='id_empleado'>ID del empleado:&nbsp;&nbsp;</label>";
echo "<input type='text' name='id_empleado' id='id_empleado' required><br><br>";

echo "<input type='submit' value='Modificar' style='padding: 10px 20px; background-color: pink; border-radius: 5px;'>";
echo "&nbsp;&nbsp;<a href='menuEmpleados.html' style='padding: 10px 20px; background-color: pink; text-decoration: none; border-radius: 5px;'>REGRESAR</a>";
echo "</fieldset>";
echo "</form>";

// Procesar la solicitud POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];
    $id_empleado = $_POST['id_empleado'];

    // Seguridad básica: evitar SQL injection (puedes mejorar esto con consultas preparadas)
    $campo = mysqli_real_escape_string($con, $campo);
    $valor = mysqli_real_escape_string($con, $valor);
    $id_empleado = mysqli_real_escape_string($con, $id_empleado);

    // Actualizar
    $query = "UPDATE EMPLEADOS SET $campo = '$valor' WHERE ID_EMPLEADO = '$id_empleado'";
    $resultado = mysqli_query($con, $query);

    if (mysqli_affected_rows($con) > 0) {
        echo "<center><p style='color: green;'>Empleado modificado con éxito.</p></center>";
    } else {
        echo "<center><p style='color: red;'>No se pudo modificar el empleado. Verifica el ID o los datos.</p></center>";
    }
}
?>
