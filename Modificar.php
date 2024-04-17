<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$json=json_decode(file_get_contents('php://input'));

$Id=$json->Id;
$Nombre =$json->Nombre;
$Descripcion=$json->Descripcion;
$Precio=$json->Precio;
$Existencias=$json->Existencias;
$codigo_barras =$json->codigo_barras;
$Precio =$json->Precio;

$sensql = "update articulos set Nombre='$Nombre', Descripcion='$Descripcion', Precio='$Precio',Existencias='$Existencias',  codigo_barras='$codigo_barras'  where Id=$Id";
echo $sensql;
$con =  mysqli_connect("localhost", "id22052584_osva", "Osva123$","id22052584_proyectoosva");
$res = mysqli_query($con, $sensql);
mysqli_close($con);
echo json_encode($res);
?>
