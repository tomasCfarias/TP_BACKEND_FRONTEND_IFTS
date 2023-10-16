<?php 

include ("connection.php" ); 
$conn = conexion();
$sql = "SELECT name,Id,quantity,price,description FROM productos";
$result = $conn -> query($sql);
$rows = array();

$data = [];
while ($fetch=mysqli_fetch_assoc($result)){
    $data[] = $fetch;
}
print_r(json_encode($data));

?>