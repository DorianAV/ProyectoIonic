<?php
header("Access-Control-Allow-Origin: *");
$usuario=$_GET['usuario'];
$contrasena=$_GET['contrasena'];
$sql="select * from usuario WHERE usuario ='$usuario' AND contrasena='$contrasena'";
$alumno=array();
$alumno=null;
$con=mysqli_connect("localhost", "id22052584_osva", "Osva123$","id22052584_proyectoosva");
$alu=mysqli_query($con, $sql);
if($al=mysqli_fetch_array($alu)){
    $alumno[]=$al;
}
mysqli_close($con);
echo json_encode($alumno);
?>