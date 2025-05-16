<?php
include("conexionn.php");
if (isset($_POST['ID_PRODUCTO']) && !empty($_POST['ID_PRODUCTO']) &&
	isset($_POST['NOMBRE']) && !empty($_POST['NOMBRE']) &&
	isset($_POST['DESCRIPCION']) && !empty($_POST['DESCRIPCION']) &&
	isset($_POST['CATEGORIA']) && !empty($_POST['CATEGORIA']) &&
	isset($_POST['STOCK_ACTUAL']) && !empty($_POST['STOCK_ACTUAL']))
{
	if ($con==true) 
	{
		mysqli_query($con,"INSERT INTO PRODUCTO VALUES('{$_POST['ID_PRODUCTO']}',
			'{$_POST['NOMBRE']}',
			'{$_POST['DESCRIPCION']}',
			'{$_POST['CATEGORIA']}',
			'{$_POST['STOCK_ACTUAL']}')");
		echo "EL REGISTRO SE AGREGO CORRECTAMENTE";
		echo "<br><br>";
		echo "<center><table style='border-collapse: collapse: width:80%; text-align:center;'>";
		echo "<tr style='background-color:#e9a98a;'><th>ID_PRODUCTO</th>";
		echo "<th>NOMBRE</th>";
		echo "<th>DESCRIPCION</th>";
		 echo "<th>CATEGORIA</th>";
		echo "<th>STOCK_ACTUAL</th></tr>";
		$consultitaa=mysqli_query($con,"SELECT * FROM PRODUCTO");
		while ($filaaa=mysqli_fetch_array($consultitaa))
		{
			echo "<tr>
			<td>$filaaa[0]</td>
			<td>$filaaa[1]</td>
			<td>$filaaa[2]</td>
			<td>$filaaa[3]</td>
			<td>$filaaa[4]</td</tr>";

		}
		echo "</table></center>";
		echo "<br><br>";
		echo "<a href='menuProductos.html'><button>REGRESAR AL MENU</button></a>";
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