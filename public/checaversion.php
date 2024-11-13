<?php

include('functions.php');

$sucursal = $_GET['sucursal'];

if($resultset=getSQLResultSet("SELECT version FROM version")){
	while($row = $resultset->fetch_array(MYSQLI_NUM)){
		echo json_encode($row);
	}
}

?>