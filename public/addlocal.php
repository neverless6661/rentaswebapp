<?php
header("Location: tables.php");
$servername = "35.194.11.126";
$username = "usrsondealo";
$password = "srk142536";
$dbname = "rentas";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$nombre_local = $_POST["nombre_local"];
$renta_local = $_POST["renta_local"];
$dia_pago = $_POST["dia_pago"];
$type_local = $_POST["type_local"];

echo 'Nombre Local: '.$nombre_local."<br>";
echo 'Renta Local: '.$renta_local."<br>";
echo 'Día pago: '.$dia_pago."<br>";
echo 'Tipo local: '.$type_local."<br>";

$sql2 = "INSERT INTO inmueble (nombre_depa, tipo, dia_pago, precio_renta) VALUES('$nombre_local', $type_local, $dia_pago, $renta_local);";
mysqli_query($conn, $sql2);


?>
