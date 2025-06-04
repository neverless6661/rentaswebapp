<?php
//header("Location: tables.php");
require_once('connections/conexion.php');

// Create connection

$conn = mysqli_connect($hostname,$username,$password,$database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$tipo_pago = $_POST["type_payment"];
$cantidad_pago = $_POST["cantidad_pago"];
$id_inmueble = $_POST["id_inmueble"];
$id_inquilino = $_POST["id_inquilino"];
$total_renta = 0;
$fecha_ultpago = $_POST["fechapago"];
$fecha_last_payment = $fecha_ultpago." 00:00:00";

echo "TIPO DE PAGO: ".$tipo_pago."<br>";
echo "CANTIDAD DE PAGO: ".$cantidad_pago."<br>";
echo "ID DE INMUEBLE: ".$id_inmueble."<br>";
echo "ID DE INQUILINO: ".$id_inquilino."<br>";
echo "FECHA ULT PAGO: ".$fecha_ultpago."<br>";


$sqlinmueble = "SELECT * FROM inmueble WHERE id = $id_inmueble";
$result_inmueble = mysqli_query($conn, $sqlinmueble);
if (mysqli_num_rows($result_inmueble) > 0) {
    while ($row_inmueble = mysqli_fetch_assoc($result_inmueble)) {
        $total_renta = $row_inmueble["precio_renta"];
    }
}

$pagohecho = $total_renta - $cantidad_pago;

echo "PAGO HECHO: ".$pagohecho."<br>";



$sqlregrenta = "SELECT *  FROM registro_renta WHERE id_inmueble = $id_inmueble";
$result_regrenta = mysqli_query($conn, $sqlregrenta);
if(mysqli_num_rows($result_regrenta) > 0){
    if($pagohecho > 0){
        $sqlupdateregreta = "UPDATE registro_renta SET fecha_ult_pago = '$fecha_last_payment', deuda_pago = $pagohecho WHERE id_inmueble = $id_inmueble" ;
        mysqli_query($conn, $sqlupdateregreta);
    }
    else{
        $sqlupdateregreta = "UPDATE registro_renta SET fecha_ult_pago = '$fecha_last_payment', deuda_pago = $pagohecho WHERE id_inmueble = $id_inmueble" ;
        mysqli_query($conn, $sqlupdateregreta);
    }

}

/*

$sql2 = "INSERT INTO inmueble (nombre, id_tipo, dia_pago, precio_renta) VALUES('$nombre_local', $type_local, $dia_pago, $renta_local)";
mysqli_query($conn, $sql2);

*/


?>
