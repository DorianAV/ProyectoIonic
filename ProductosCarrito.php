<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$con = mysqli_connect("sql213.infinityfree.com", "if0_36377064", "6NX2ofaogNdte","if0_36377064_apirestosva");

if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
//$sql="SELECT  SUM(subtotal) AS total_subtotal FROM ( SELECT  p.Id,  p.Nombre,  p.Precio,  p.Precio * c.cantidad_Comprada AS subtotal, p.Existencias,  c.Cantidad_Comprad   FROM  Carrito c  INNER JOIN Articulos p ON c.id_producto = p.Id ) AS subquery";
$sql="select p.Id, p.Nombre, p.Precio, p.Precio * c.cantidad_Comprada AS subtotal,p.Existencias, c.Cantidad_Comprada from Carrito c inner join Articulos p on c.id_producto=p.Id;";
//$sql = "SELECT * FROM carrito";
$result = mysqli_query($con, $sql);

$products = [];

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

echo json_encode($products);

mysqli_close($con);
?>