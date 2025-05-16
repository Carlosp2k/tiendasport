<?php
include("conexionn.php");
if (isset($_POST['ID_CLIENTE']) && !empty($_POST['ID_CLIENTE']) &&
	isset($_POST['NOMBRE']) && !empty($_POST['NOMBRE']) &&
	isset($_POST['CORREO']) && !empty($_POST['CORREO']) &&
	isset($_POST['CONTRA']) && !empty($_POST['CONTRA']) &&
	isset($_POST['TELEFONO']) && !empty($_POST['TELEFONO']) &&
	isset($_POST['DIRECCION_ENVIO']) && !empty($_POST['DIRECCION_ENVIO']) &&
	isset($_POST['FECHA_REGISTRO']) && !empty($_POST['FECHA_REGISTRO']))
{
	if ($con==true)
	{
		mysqli_query($con,"INSERT INTO CLIENTE VALUES('{$_POST['ID_CLIENTE']}',
			'{$_POST['NOMBRE']}',
			'{$_POST['CORREO']}',
			'{$_POST['CONTRA']}',
			'{$_POST['TELEFONO']}',
			'{$_POST['DIRECCION_ENVIO']}',
			'{$_POST['FECHA_REGISTRO']}')");
		echo "EL REGISTRO SE AGREGO CORRECTAMENTE";
		echo "<center><table style='border-collapse: collapse: width:80%;'>";
		echo "<tr style='background-color:#ecf4ac;'><th>ID_CLIENTE</th>";
		echo "<th>NOMBRE</th>";
		echo "<th>CORREO</th>";
		echo "<th>CONTRA</th>";
		echo "<th>TELEFONO</th></tr>";
		echo "<th>DIRECCION_ENVIO</th>";
		echo "<th>FECHA_REGISTRO</th></tr>";
		$consultt=mysqli_query($con,"SELECT * FROM CLIENTE");
		while ($fila=mysqli_fetch_array($consultt))
		{
			echo "<tr>
			<td>$fila[0]</td>
			<td>$fila[1]</td>
			<td>$fila[2]</td>
			<td>$fila[3]</td>
			<td>$fila[4]</td>
			<td>$fila[5]</td>
			<td>$fila[6]</td>";

		}
		echo "</table></center>";
		echo "<br><br>";
		echo "<a href='formularioCliente.html'><button>INSERTAR NUEVO CLIENTE</button></a>";
	}
	else
	{
		echo "LO SENTIMOS NO SE PUDO AGREGAR EL REGISTRO. VAERIFICALO DE NUEVO";
	}
}
else
{
	echo "NO SE CAPTURARON TODOS LOS DATOS";
}
?>