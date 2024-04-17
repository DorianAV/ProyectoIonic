
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$json = json_decode(file_get_contents('php://input'));

if ($_SERVER["REQUEST_METHOD"] == 'OPTIONS') {
    header('HTTP/1.1 200 OK');
    exit();
}

$id_producto = $json->id_producto;
$cantidad = 1;

$con = mysqli_connect("localhost", "id21621412_root", "Osva123$","id21621412_proyecto");

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}

$sql = "SELECT * FROM carrito WHERE id_producto = $id_producto";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // Si el producto ya existe en el carrito, actualizamos la cantidad comprada
    $sql = "UPDATE carrito SET Cantidad_Comprada = Cantidad_Comprada + $cantidad WHERE id_producto = $id_producto";
} else {
    // Si el producto no existe en el carrito, lo insertamos
    $sql = "INSERT INTO carrito (id_producto, Cantidad_Comprada, fecha) VALUES ($id_producto, $cantidad, NOW())";
}

$res = mysqli_query($con, $sql);

if (!$res) {
    echo "Error: " . mysqli_error($con);
} else {
    echo json_encode(true);
}

mysqli_close($con);
?>