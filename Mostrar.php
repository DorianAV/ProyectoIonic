<?php
header("Access-Control-Allow-Origin: *");
$conexion = mysqli_connect("localhost", "id22052584_osva", "Osva123$","id22052584_proyectoosva");
$sen = "select * from articulos";
$lista=array();
$dato = mysqli_query($conexion, $sen);
while ($rest = mysqli_fetch_array($dato)) {
$lista[]=$rest;
}
mysqli_close($conexion);
echo json_encode($lista);
?>
