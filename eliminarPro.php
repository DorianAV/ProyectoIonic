<?php
header("Access-Control-Allow-Origin: *");
$json=json_decode(file_get_contents('php://input'));

$Id = $_GET["Id"];

$sensql = "delete from carrito  where Id_producto=$Id";

$con=mysqli_connect("localhost", "root", "2004","servicios");

$res = mysqli_query($con, $sensql);

mysqli_close($con);
//echo $res;
echo json_encode($res);
?>