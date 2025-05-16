<?php
include("conexionn.php");
if (isset($_POST['ID_PEDIDO']) && !empty($_POST['ID_PEDIDO']) &&
	isset($_POST['ID_CLIENTE']) && !empty($_POST['ID_CLIENTE']) &&
	isset($_POST['FECHA_PEDIDO']) && !empty($_POST['FECHA_PEDIDO']) &&
	isset($_POST['TIPO_DE_ENTREGA']) && !empty($_POST['TIPO_DE_ENTREGA']) &&
	isset($_POST['TOTAL']) && !empty($_POST['TOTAL']))
{
	if ($con==true) 
	{
		mysqli_query($con,"INSERT INTO PEDIDOS VALUES('{$_POST['ID_PEDIDO']}',
			'{$_POST['ID_CLIENTE']}',
			'{$_POST['FECHA_PEDIDO']}',
			'{$_POST['TIPO_DE_ENTREGA']}',
			'{$_POST['TOTAL']}')");
		echo "EL REGISTRO SE AGREGO CORRECTAMENTE";
		echo "<br><br>";
		echo "<center><table style='border-collapse: collapse: width:80%; text-align:center;'>";
		echo "<tr style='background-color:#e9a98a;'><th>ID_PEDIDO</th>";
		echo "<th>ID_CLIENTE</th>";
		echo "<th>FECHA_PEDIDO</th>";
		 echo "<th>TIPO_DE_ENTREGA</th>";
		echo "<th>TOTAL</th></tr>";
		$consultitaa=mysqli_query($con,"SELECT * FROM PEDIDOS");
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
		echo "<a href='menuDetallePedido.html'><button>REGRESAR AL MENU</button></a>";
		echo "<a href='formPedido.html'><button>INGRESAR UN NUEVO REGISTRO</button></a>";
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