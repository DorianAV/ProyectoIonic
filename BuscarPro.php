<?php
header("Access-Control-Allow-Origin: *");
    $codigo_barras = $_GET['codigo_barras'];
    $sen = "SELECT * FROM articulos WHERE codigo_barras LIKE '%$codigo_barras%'";
    $artic=array();
    $conexion = new mysqli ("localhost", "id22052584_osva", "Osva123$","id22052584_proyectoosva");
    $dato = mysqli_query($conexion, $sen);
    if ($rest = mysqli_fetch_array($dato)) 
    {
    $artic[]=$rest;

    }
 mysqli_close($conexion);
   echo json_encode($artic);
?>