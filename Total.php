
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
$con=mysqli_connect("localhost", "root", "2004","servicios");
$sql = "INSERT INTO Venta(Fecha,Total) VALUES (NOW(), $Total)";
if (mysqli_query($con, $sql)) {
    $res['datos'] = ['Total' => $Total];
} else {
    $res['resultado'] = 'error';
    $res['mensaje'] = 'Error al realizar la venta: ' . mysqli_error($con);
}

$sent = "delete from Carrito";
mysqli_query($con, $sent);
mysqli_close($con);
echo json_encode($res);
?>