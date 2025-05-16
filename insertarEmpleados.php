<?php 
include("conexionn.php");

if (isset($_POST['ID_EMPLEADO']) && !empty($_POST['ID_EMPLEADO']) &&
	isset($_POST['NOMBRE']) && !empty($_POST['NOMBRE']) &&
	isset($_POST['USUARIO']) && !empty($_POST['USUARIO']) &&
	isset($_POST['CONTRA']) && !empty($_POST['CONTRA']) &&
	isset($_POST['EDAD']) && !empty($_POST['EDAD']) &&
	isset($_POST['CARGO']) && !empty($_POST['CARGO']) &&
	isset($_POST['NIVEL_ACCESO']) && !empty($_POST['NIVEL_ACCESO']))
{
	if ($con==true) 
	{
		mysqli_query($con,"INSERT INTO EMPLEADOS VALUES('{$_POST['ID_EMPLEADO']}',
			'{$_POST['NOMBRE']}',
			'{$_POST['USUARIO']}',
			'{$_POST['CONTRA']}',
			'{$_POST['EDAD']}',
			'{$_POST['CARGO']}',
			'{$_POST['NIVEL_ACCESO']}')");
		echo "EL REGISTRO SE AGREGO CORRECTAMENTE";
		echo "<br><br>";

		// Aquí corregimos el formato de la tabla
		echo "<center><table style='border-collapse: collapse; width:80%; text-align:center;'>";
		echo "<tr style='background-color:#e9a98a;'>";
		echo "<th>ID_EMPLEADO</th>";
		echo "<th>NOMBRE</th>";
		echo "<th>USUARIO</th>";
		echo "<th>CONTRA</th>";
		echo "<th>EDAD</th>";
		echo "<th>CARGO</th>";
		echo "<th>NIVEL_ACCESO</th>";
		echo "</tr>";

		$consultitaa = mysqli_query($con, "SELECT * FROM EMPLEADOS");
		while ($filaaa = mysqli_fetch_array($consultitaa))
		{
			echo "<tr>";
			echo "<td>" . $filaaa[0] . "</td>";
			echo "<td>" . $filaaa[1] . "</td>";
			echo "<td>" . $filaaa[2] . "</td>";
			echo "<td>" . $filaaa[3] . "</td>";
			echo "<td>" . $filaaa[4] . "</td>";
			echo "<td>" . $filaaa[5] . "</td>";
			echo "<td>" . $filaaa[6] . "</td>";
			echo "</tr>";
		}
		echo "</table></center>";
		echo "<br><br>";
		echo "<a href='menuEmpleados.html'><button>REGRESAR AL MENU</button></a>&nbsp;&nbsp;&nbsp;&nbsp";
		echo "<a href='formEmpleados.html'><button>INGRESAR UN REGISTRO</a>";
	}
	else
	{
		echo "LO SIENTO. NO SE PUDO AGREGAR EL REGISTRO";
	}
}
else
{
	echo "NO SE CAPTURARON TODOS LOS DATOS. VERIFICALOS DE NUEVO";
}
?>
