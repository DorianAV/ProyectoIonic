
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$json=json_decode(file_get_contents('php://input'));

if($_SERVER["REQUEST_METHOD"]=='OPTIONS'){
    header ('HTTP/1.1 200 OK');
    exit();
}
$Nombre =$json->Nombre;
$Descripcion=$json->Descripcion;
$Precio=$json->Precio;
$Existencias =$json->Existencias;
$codigo_barras=$json->codigo_barras;
$sensql = "insert into articulos (Nombre, Descripcion,  Precio, Existencias,codigo_barras) values('$Nombre','$Descripcion', '$Precio', '$Existencias', '$codigo_barras')";
echo $sensql;
$con =  mysqli_connect("localhost", "id22052584_osva", "Osva123$","id22052584_proyectoosva");
$res = mysqli_query($con, $sensql);
mysqli_close($con);
echo json_encode($res);
?>