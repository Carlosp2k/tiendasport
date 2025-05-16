<?php
include("conexionn.php");

// Mostrar tabla de movimientos
echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Movimientos</title>
    <link rel='stylesheet' type='text/css' href='estilooo.css'>
    <link rel='stylesheet' type='text/css' href='estilotablin.css'>
</head>
<body>
<center>
    <table style='border-collapse: collapse; width:80%; text-align:center;'>
        <tr style='background-color:#89ece6;'>
            <th>ID_MOVIMIENTO</th>
            <th>ID_PRODUCTO</th>
            <th>TIPO_MOVIMIENTO</th>
            <th>CANTIDAD</th>
            <th>FECHA</th>
            <th>DESCRIPCION</th>
            <th>ID_EMPLEADO</th>
        </tr>";

$consultita = mysqli_query($con, "SELECT * FROM INVENTARIO");
while ($filaa = mysqli_fetch_array($consultita)) {
    echo "<tr>
        <td>{$filaa['ID_MOVIMIENTO']}</td>
        <td>{$filaa['ID_PRODUCTO']}</td>
        <td>{$filaa['TIPO_MOVIMIENTO']}</td>
        <td>{$filaa['CANTIDAD']}</td>
        <td>{$filaa['FECHA']}</td>
        <td>{$filaa['DESCRIPCION']}</td>
        <td>{$filaa['ID_EMPLEADO']}</td>
    </tr>";
}

echo "</table><br><br>";

// Formulario para eliminar movimiento
echo "<form method='POST' action=''>
    <fieldset style='width:50%'>
        <h2>ID_MOVIMIENTO A ELIMINAR:</h2>
        <input type='text' name='ELIMINARCLI' required>
        <br><br>
        <input type='submit' value='Eliminar' class='custom-btn btn-9'>
    </fieldset>
</form>
<br>
<a href='menuEMPLEADOS.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";

// Procesamiento del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($con, $_POST['ELIMINARCLI']);
    mysqli_query($con, "DELETE FROM INVENTARIO WHERE ID_MOVIMIENTO='$id'");

    echo "<h2>EL REGISTRO SE BORRÓ EXITOSAMENTE</h2>";

    // Mostrar tabla actualizada
    echo "<table style='border-collapse: collapse; width:80%; text-align:center;'>
        <tr style='background-color:#89ece6;'>
            <th>ID_MOVIMIENTO</th>
            <th>ID_PRODUCTO</th>
            <th>TIPO_MOVIMIENTO</th>
            <th>CANTIDAD</th>
            <th>FECHA</th>
            <th>DESCRIPCION</th>
            <th>ID_EMPLEADO</th>
        </tr>";

    $consultita = mysqli_query($con, "SELECT * FROM INVENTARIO");
    while ($filaa = mysqli_fetch_array($consultita)) {
        echo "<tr>
            <td>{$filaa['ID_MOVIMIENTO']}</td>
            <td>{$filaa['ID_PRODUCTO']}</td>
            <td>{$filaa['TIPO_MOVIMIENTO']}</td>
            <td>{$filaa['CANTIDAD']}</td>
            <td>{$filaa['FECHA']}</td>
            <td>{$filaa['DESCRIPCION']}</td>
            <td>{$filaa['ID_EMPLEADO']}</td>
        </tr>";
    }

    echo "</table><br>
    <a href='menuEMPLEADOS.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";
}

echo "</center></body></html>";
?>
