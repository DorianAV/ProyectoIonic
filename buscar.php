<?php
header("Access-Control-Allow-Origin: *");
   $Id = $_GET['Id'];
   $sen = "select * from articulos where Id=$Id";
   
    $artic=array();
    $conexion =  mysqli_connect("localhost", "id22052584_osva", "Osva123$","id22052584_proyectoosva");
   
    
    $dato = mysqli_query($conexion, $sen);

    if ($rest = mysqli_fetch_array($dato)) 
    {
    $artic[]=$rest;

    }
 mysqli_close($conexion);
   echo json_encode($artic);
?>