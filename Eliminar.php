<?php
header("Access-Control-Allow-Origin: *");
$json=json_decode(file_get_contents('php://input'));

$Id = $_GET["Id"];

$sensql = "delete from articulos where Id=$Id";

$con =  mysqli_connect("localhost", "id22052584_osva", "Osva123$","id22052584_proyectoosva");

$res = mysqli_query($con, $sensql);

mysqli_close($con);
//echo $res;
echo json_encode($res);
?>