<?php
header("Location: tables.php");
require_once('connections/conexion.php');

// Create connection

$conn = mysqli_connect($hostname,$username,$password,$database);
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

$sql2 = "INSERT INTO inmueble (nombre, id_tipo, dia_pago, precio_renta) VALUES('$nombre_local', $type_local, $dia_pago, $renta_local);";
mysqli_query($conn, $sql2);

$sqllastinmueble = "SELECT * FROM inmueble ORDER BY id DESC LIMIT 1";
$resultlastinmueble = mysqli_query($conn, $sqllastinmueble);
if(mysqli_num_rows($resultlastinmueble) > 0){
    while($row_lastinmueble = mysqli_fetch_assoc($resultlastinmueble)){
        $idlastinmueble = $row_lastinmueble["id"];

        $sqlinsertregenta = "INSERT INTO registro_renta(id_inmueble, fecha_pago, fecha_ult_pago, fecha_prox_pago, incremento_pago, deuda_pago)
        VALUES($idlastinmueble, NOW(), NOW(), NOW(), 0.00, 0.00)";
        mysqli_query($conn, $sqlinsertregenta);
    }
}


?>
