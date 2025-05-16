<?php
include("conexionn.php");

echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;'>";
echo "<tr style='background-color:#89ece6;'>
        <th>ID_EMPLEADO</th>
        <th>NOMBRE</th>
        <th>USUARIO</th>
        <th>CONTRA</th>
        <th>EDAD</th>
        <th>CARGO</th>
        <th>NIVEL_ACCESO</th>
      </tr>";

$consultita = mysqli_query($con, "SELECT * FROM EMPLEADOS");

while ($filaa = mysqli_fetch_array($consultita)) {
    echo "<tr>
            <td>$filaa[0]</td>
            <td>$filaa[1]</td>
            <td>$filaa[2]</td>
            <td>$filaa[3]</td>
            <td>$filaa[4]</td>
            <td>$filaa[5]</td>
            <td>$filaa[6]</td>
          </tr>";
}

echo "</table></center><br><br>";

echo "<link rel='stylesheet' type='text/css' href='estilooo.css'>";
echo "<link rel='stylesheet' type='text/css' href='estilotablin.css'>";
echo "<br><br>";

echo "<form method='POST' action=''>
        <fieldset style='width:50%'>
        <br>
        <h2>ID_EMPLEADO A ELIMINAR:</h2>
        <input type='text' name='ELIMINARCLI'>
        <br><br>
        <input type='submit' value='Eliminar' class='custom-btn btn-9'>
        <br>
        </fieldset>
      </form><br>";

echo "<a href='menuEmpleados.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idEliminar = $_POST['ELIMINARCLI'];
    mysqli_query($con, "DELETE FROM EMPLEADOS WHERE ID_EMPLEADO='$idEliminar'");

    echo "<h2>EL REGISTRO SE BORRÓ EXITOSAMENTE</h2>";

    echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;'>";
    echo "<tr style='background-color:#89ece6;'>
            <th>ID_EMPLEADO</th>
            <th>NOMBRE</th>
            <th>USUARIO</th>
            <th>CONTRA</th>
            <th>EDAD</th>
            <th>CARGO</th>
            <th>NIVEL_ACCESO</th>
          </tr>";

    $consultita = mysqli_query($con, "SELECT * FROM EMPLEADOS");

    while ($filaa = mysqli_fetch_array($consultita)) {
        echo "<tr>
                <td>$filaa[0]</td>
                <td>$filaa[1]</td>
                <td>$filaa[2]</td>
                <td>$filaa[3]</td>
                <td>$filaa[4]</td>
                <td>$filaa[5]</td>
                <td>$filaa[6]</td>
              </tr>";
    }

    echo "</table></center><br>";

    echo "<a href='menuEmpleados.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";
    echo "<link rel='stylesheet' type='text/css' href='estilooo.css'>";
}
?>
