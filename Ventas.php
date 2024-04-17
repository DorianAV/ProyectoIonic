<?php
header("Access-Control-Allow-Origin: *");
$conexion=mysqli_connect("localhost", "root", "2004","servicios");
$sen = "select * from Venta ";
$lista=array();
$dato = mysqli_query($conexion, $sen);
while ($rest = mysqli_fetch_array($dato)) {
$lista[]=$rest;
}
mysqli_close($conexion);
echo json_encode($lista);
?>
