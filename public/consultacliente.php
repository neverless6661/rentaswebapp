<?php
require_once('Connections/conexion7.php');
$identificador = $_GET['identificador'];
$sucursal = $_GET['sucursal'];

$conexion = mysqli_connect($hostname,$username,$password,$database);

//generamos la consulta
$sql = "SELECT * FROM cliente WHERE identificador=$identificador ORDER BY id ASC";
$result = mysqli_query($conexion, $sql);

while($row = mysqli_fetch_array($result)) 
{ 
    $sucursal=$row['sucursal'];
    $nombre=$row['nombre'];  
    $insertado = $nombre.'-'.$sucursal;
  
    $registros[] = array($insertado); 
}
    
//Creamos el JSON

$json_string = json_encode($registros);
echo $json_string;
?>