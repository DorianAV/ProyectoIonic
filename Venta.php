
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$json = json_decode(file_get_contents('php://input'));

if ($_SERVER["REQUEST_METHOD"] == 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit();
}
$Total = $json->Total;
$con=mysqli_connect("localhost", "root", "2004","servicios");
$sql = "INSERT INTO Venta(Fecha, Total) VALUES ( NOW(), $Total)";
mysqli_close($con);
?>