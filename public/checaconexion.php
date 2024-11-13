<?php
require_once('Connections/conexion7.php');
$conexion = mysqli_connect($hostname,$username,$password,$database);

$sqlchk = "SELECT id FROM calificaciones WHERE id=1";
$resultchk = mysqli_query($conexion, $sqlchk);
$fila = mysqli_num_rows($resultchk);
if($fila == 1){
	$num = '1';
	$estado[] = array($num);
	echo json_encode($estado);
}
else{
	$num = '0';
	$estado[] = array($num);
	echo json_encode($estado);
}
?>