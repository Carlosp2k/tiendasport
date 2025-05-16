<?php
include("conexionn.php");

// Mostrar tabla de productos
echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;'>";
echo "<tr style='background-color:#89ece6;'>
        <th>ID_PRODUCTO</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>CATEGORIA</th>
        <th>STOCK_ACTUAL</th>
      </tr>";

$consultita = mysqli_query($con, "SELECT * FROM PRODUCTO");
while ($filaa = mysqli_fetch_array($consultita)) {
    echo "<tr>
            <td>{$filaa[0]}</td>
            <td>{$filaa[1]}</td>
            <td>{$filaa[2]}</td>
            <td>{$filaa[3]}</td>
            <td>{$filaa[4]}</td>
            <td>{$filaa[5]}</td>
          </tr>";
}
echo "</table></center>";

echo "<br><br>";
echo "<link rel='stylesheet' type='text/css' href='estilooo.css'>";
echo "<link rel='stylesheet' type='text/css' href='estilotablin.css'>";
echo "<br><br>";

// Formulario para eliminar producto
echo "<form method='POST' action=''>
        <fieldset style='width:50%'>
        <br>
        <h2>ID_PRODUCTO A ELIMINAR:</h2>
        <input type='text' name='ELIMINARCLI'>
        <br><br>
        <input type='submit' value='Eliminar' class='custom-btn btn-9'>
        <br>
        </fieldset>
      </form>";

echo "<br>";
echo "<a href='menuPRODUCTOS.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";

// Eliminar producto si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_eliminar = mysqli_real_escape_string($con, $_POST['ELIMINARCLI']);
    mysqli_query($con, "DELETE FROM PRODUCTO WHERE ID_PRODUCTO='$id_eliminar'");

    echo "<h2>EL REGISTRO SE BORRÓ EXITOSAMENTE</h2>";

    // Mostrar tabla actualizada
    echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;'>";
    echo "<tr style='background-color:#89ece6;'>
            <th>ID_PRODUCTO</th>
            <th>NOMBRE</th>
            <th>DESCRIPCION</th>
            <th>PRECIO</th>
            <th>CATEGORIA</th>
            <th>STOCK_ACTUAL</th>
          </tr>";

    $consultita = mysqli_query($con, "SELECT * FROM PRODUCTOS");
    while ($filaa = mysqli_fetch_array($consultita)) {
        echo "<tr>
                <td>{$filaa[0]}</td>
                <td>{$filaa[1]}</td>
                <td>{$filaa[2]}</td>
                <td>{$filaa[3]}</td>
                <td>{$filaa[4]}</td>
                <td>{$filaa[5]}</td>
              </tr>";
    }
    echo "</table></center>";
    echo "<a href='menuPRODUCTOS.html'><button class='custom-btn btn-5'><span>REGRESAR</span></button></a>";
    echo "<link rel='stylesheet' type='text/css' href='estilooo.css'>";
}
?>
