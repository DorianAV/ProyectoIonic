<?php
header("Access-Control-Allow-Origin: *");
$Id = $_GET['Id'];

$conexion = mysqli_connect("localhost", "id21621412_root", "Osva123$","id21621412_proyecto"); 
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
$sen = "select det_venta.cantidad_comprada, det_venta.Subtotal, Articulos.Nombre, Articulos.codigo_barras, Articulos.precio from det_venta inner join Articulos on det_venta.id_producto=Articulos.id where id_venta=$Id";
$dato = mysqli_query($conexion, $sen);
$lista = array();
while ($rest = mysqli_fetch_array($dato)) {
    $lista[]=$rest;
}
if (empty($lista)) {
    echo json_encode(array("error" => "No se encontraron resultados"));
} else {
    echo json_encode($lista);
}
?>