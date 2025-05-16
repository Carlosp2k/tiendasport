<?php

$servidor="localhost";
$usuario="root";
$contra="";
$bd="cuxsports";

$con=mysqli_connect($servidor, $usuario, $contra, $bd);
if($con==true)
{
	echo "<center>";
	echo "Estas Conectado a la Base De Datos";
	echo "<br><br>";
	echo "<img src='logo.png' style='display:block;' width='250' height='250'><br>";
}
else
{
	echo "No hay Conexion";
}
?>