<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$json = json_decode(file_get_contents('php://input'));

if ($_SERVER["REQUEST_METHOD"] == 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit();
}
$Total = $json->Total;
$res = [
    'resultado' => 'success',
    'mensaje' => 'Venta realizada correctamente',
    'datos' => []
];
$con = mysqli_connect("sql213.infinityfree.com", "if0_36377064", "6NX2ofaogNdte","if0_36377064_apirestosva");
$sql = "INSERT INTO Venta(Fecha,Total) VALUES (NOW(), $Total)";
if (mysqli_query($con, $sql)) {
    $idven = mysqli_insert_id($con); 
    $res['datos'] = ['Total' => $Total, 'idven' => $idven];
} else {
    $res['resultado'] = 'error';
    $res['mensaje'] = 'Error al realizar la venta: ' . mysqli_error($con);
}
$mostr="select c.Cantidad_Comprada, p.precio, p.Id, p.Nombre, p.precio*c.cantidad_Comprada from Carrito c inner join Articulos p on c.id_producto=p.Id;";
$vensql = mysqli_query($con, $mostr);
while ($prod = mysqli_fetch_array($vensql)) {
    $sqliv = "insert into det_venta values($idven, $prod[2], '$prod[0]', $prod[4], $prod[1])";
    mysqli_query($con, $sqliv);
}   
$sent = "delete from Carrito";
mysqli_query($con, $sent);
mysqli_close($con);
echo json_encode($res);
?>